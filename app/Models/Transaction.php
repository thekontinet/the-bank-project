<?php

namespace App\Models;

use App\Builders\TransactionBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';
    const STATUS_SUCCESS = 'success';
    const STATUS_FAILED = 'failed';
    protected $guarded = [];
    protected $casts = ['data' => 'array'];

    public static function make(Account $account, int $amount){
        return new TransactionBuilder($account, $amount);
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function booted(){
        static::addGlobalScope(function(Builder $query){
            return $query->latest();
        });
    }
}
