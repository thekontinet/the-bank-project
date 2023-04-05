<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'gender',
        'password',
        'country',
        'state',
        'blocked',
        'pin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'blocked' => 'boolean'
    ];

    public function hasAdminRole(){
        return $this->attributes['is_admin'];
    }

    public function isBlocked(){
        return $this->attributes['blocked'];
    }

    public function getAvatarAttribute(){
        $path = $this->image()->first()?->path;
        return $path ? Storage::url($path) : 'https://ui-avatars.com/api/?background=random&name=' . $this->name;
    }

    public function getFirstnameAttribute(){
        return ucwords(explode(' ', $this->name)[0] ?? $this->name);
    }

    public function getAccountAttribute(){
        return $this->accounts()->first();
    }

    public function accounts(){
        return $this->hasMany(Account::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function kyc(){
        return $this->hasOne(UserKyc::class);
    }
}
