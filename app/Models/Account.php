<?php

namespace App\Models;

use App\Exceptions\TransactionException;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    use HasFactory;

    const TYPE_SAVINGS = 'savings';
    const TYPE_CURRENT= 'current';
    const TYPE_JOINT = 'coporate';

    const TYPES = [self::TYPE_SAVINGS, self::TYPE_CURRENT, self::TYPE_JOINT];

    protected $guarded = [];

    public function getRouteKeyName(){
        return 'number';
    }

    public function getShortNumberAttribute(){
        return "xxx xx " . substr($this->number, 6);
    }


    public static function make(User $user, $type, $currency = 'USD', $joint = false){
        try{
            DB::beginTransaction();
            $account =  static::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'type' => $type,
                'number' => self::generateAccountNumber(),
                'currency' => $currency,
                'is_joint' => !!$joint
            ]);
            DB::commit();
            return $account;
        }catch(Exception $e){
            DB::rollBack();
            throw $e;
        }
    }

    public static function generateAccountNumber(){
        $min = pow(10, 9);
        $max = abs(pow(10, 10) - 1);
        $number = rand($min, $max);
        if(self::where('number', $number)->exists()){
            return self::generateAccountNumber();
        }
        return abs($number);
    }


    public function removeHolders(){
        $this->holders()->where('user_id', '<>', $this->user_id)->delete();
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

    public function isJoint(){
        return $this->getAttribute('is_joint');
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

    public function holders(){
        return $this->belongsToMany(User::class, 'account_holders');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(function($q){
            /**@var App\Model\User $user */
            $user = auth()->user();
            if($user && !$user->hasAdminRole()){
                return $q->where('accounts.user_id', $user->id);
            }
        });

        static::created(function(Account $account){
            try{
                $account->holders()->syncWithoutDetaching($account->user_id);
            }catch(Exception $e){
                $account->delete();
            }
        });
    }
}
