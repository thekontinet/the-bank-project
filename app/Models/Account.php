<?php

namespace App\Models;

use App\Exceptions\TransactionException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    const TYPE_SAVINGS = 'savings';
    const TYPE_CURRENT= 'current';
    const TYPE_JOINT = 'joint';

    const TYPES = [self::TYPE_SAVINGS, self::TYPE_CURRENT, self::TYPE_JOINT];

    protected $guarded = [];

    public function getShortNumberAttribute(){
        return "xxx" . substr($this->number, 9);
    }


    public static function make(User $user, $type, $currency = 'USD'){
        return static::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'type' => $type,
            'number' => self::generateAccountNumber(),
            'currency' => $currency
        ]);
    }

    public static function generateAccountNumber(){
        // todo:Fix this to generate 10 numbers only
        return '445' . rand(100, 999) . substr(time(), 3, 7);
    }

    public function credit(int $amount){
        $amount = abs($amount);

        if($amount <= 0){
            throw new TransactionException('Invalid amount specified');
        }

        $this->balance += $amount * 100;
        return $this->save();
    }

    public function debit(int $amount){
        $amount = abs($amount);

        if($amount <= 0){
            throw new TransactionException('Invalid amount specified');
        }

        if($amount > $this->balance){
            throw new TransactionException('Insufficient balance');
        }

        $this->balance -= $amount * 100;
        return $this->save();
    }

    public function hasToken(){
        return $this->tokens()->exists();
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function tokens(){
        return $this->morphMany(Token::class, 'tokenable');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
