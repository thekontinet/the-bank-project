<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function total(): Attribute
    {
        return new Attribute(
            get: fn () => (string) BigInteger::of($this->purchase_price)->plus($this->profit)
        );
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
