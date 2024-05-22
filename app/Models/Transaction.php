<?php

namespace App\Models;

use App\Builders\TransactionBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class Transaction extends Model
{
    use HasFactory;
    use Notifiable;

    public const STATUS_PENDING = 'pending';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_SUCCESS = 'success';
    public const STATUS_FAILED = 'failed';
    protected $guarded = [];
    protected $casts = ['data' => 'array'];

    public function category(): Attribute
    {
        return new Attribute(
            get: fn () => match ($this->type) {
                'credit', 'deposit', 'transfer.recieve' => 'credit',
                'transfer.send', 'withdraw', 'debit' => 'debit',
            }
        );
    }

    public function routeNotificationForMail(Notification $notification): array|string
    {
        // Return email address and name...
        return [$this->user->email => $this->account->name];
    }

    public static function make(Account $account, int $amount)
    {
        return new TransactionBuilder($account, $amount);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function booted()
    {
        static::addGlobalScope(function (Builder $query) {
            return $query->latest('created_at');
        });
    }
}
