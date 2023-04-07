<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKyc extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function isVerified(){
        return $this->verified_at;
    }

    public function verify(){
        $this->verified_at = now();
        return $this->save();
    }

    public function unverify()
    {
        $this->verified_at = null;
        return $this->save();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
