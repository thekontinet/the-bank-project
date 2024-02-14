<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function amount(): Attribute
    {
        return new Attribute(
            set: fn ($value) => $value * 100
        );
    }

    public function amountPaid(): Attribute
    {
        return new Attribute(
            set: fn ($value) => $value * 100
        );
    }

    public function interestAmount(): Attribute
    {
        return new Attribute(get: fn () => $this->amount * ($this->interest_rate / 100));
    }

    public function total(): Attribute
    {
        return new Attribute(get: fn () => $this->amount + ($this->amount * ($this->interest_rate / 100)));
    }
}
