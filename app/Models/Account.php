<?php

namespace App\Models;

use App\Exceptions\TransactionException;
use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    public const TYPE_SAVINGS = 'savings';
    public const TYPE_CURRENT = 'current';
    public const TYPE_JOINT = 'coporate';

    public const TYPES = [self::TYPE_SAVINGS, self::TYPE_CURRENT, self::TYPE_JOINT];

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'number';
    }

    public function getShortNumberAttribute()
    {
        return 'xxx xx '.substr($this->number, 6);
    }

    public static function make(User $user, $type, $currency = 'USD', $joint = false)
    {
        try {
            DB::beginTransaction();
            $account = static::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'type' => $type,
                'number' => self::generateAccountNumber(),
                'currency' => $currency,
                'is_joint' => (bool) $joint,
            ]);
            DB::commit();

            return $account;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public static function generateAccountNumber()
    {
        $accountNumber = null;

        while (!$accountNumber) {
            $number = mt_rand(1000000000, 9999999999);

            $exists = Account::where('number', $number)->exists();

            if (!$exists) {
                $accountNumber = $number;
            }
        }

        return $accountNumber;
    }

    public function removeHolders()
    {
        $this->holders()->where('user_id', '<>', $this->user_id)->delete();
    }

    public function credit(float $amount)
    {
        if ($amount <= 0) {
            throw new TransactionException('Invalid amount specified');
        }

        $amount = BigInteger::of($amount);

        $newBalance = $amount->multipliedBy(100)->plus($this->balance ?? 0);

        return $this->update(['balance' => (string) $newBalance]);
    }

    public function debit(float $amount)
    {
        if ($amount <= 0) {
            throw new TransactionException('Invalid amount specified');
        }

        if (!$this->canWithdraw($amount)) {
            throw new TransactionException('Insufficient balance');
        }

        $amount = BigInteger::of($amount);

        $newBalance = BigInteger::of($this->balance ?? 0)->minus($amount->multipliedBy(100));

        return $this->update(['balance' => (string) $newBalance]);
    }

    public function canWithdraw(float $amount)
    {
        if ($amount <= 0) {
            throw new TransactionException('Invalid amount specified');
        }

        if (BigInteger::of($amount)->isGreaterThan($this->balance)) {
            return false;
        }

        return true;
    }

    public function hasToken()
    {
        return $this->tokens()->exists();
    }

    public function isJoint()
    {
        return $this->getAttribute('is_joint');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function tokens()
    {
        return $this->morphMany(Token::class, 'tokenable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function holders()
    {
        return $this->belongsToMany(User::class, 'account_holders');
    }

    protected static function booted(): void
    {
        static::addGlobalScope(function ($q) {
            /** @var App\Model\User $user */
            $user = auth()->user();
            if ($user && !$user->hasAdminRole()) {
                return $q->where('accounts.user_id', $user->id);
            }
        });

        static::created(function (Account $account) {
            try {
                $account->holders()->syncWithoutDetaching($account->user_id);
            } catch (\Exception $e) {
                $account->delete();
            }
        });
    }
}
