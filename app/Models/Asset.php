<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'data' => 'json',
    ];

    public function logoUrl(): Attribute
    {
        return new Attribute(
            get: fn ($value) => strlen($value) > 1 ? $value : 'https://ui-avatars.com/api/?name='.$this->symbol
        );
    }

    public function getUserInvestment(User $user)
    {
        return $this->investments()->where('user_id', $user->id)->first();
    }

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
