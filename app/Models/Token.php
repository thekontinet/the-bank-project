<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nette\Utils\Random;

class Token extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tokenable(){
        return $this->morphTo();
    }

    public function scopeUnverified(Builder $query){
        return $query->where('status', 0);
    }

    public function regenerate(){
        $type = $this->data['type'];
        $length = $this->data['length'];
        if($type === 'alphanumeric'){
            $token = Random::generate($length, '0-9a-zA-Z');
        }

        if($type === 'numeric'){
            $token = Random::generate($length, '0-9');
        }

        if($type === 'alpha'){
            $token = Random::generate($length, 'a-zA-Z');
        }

        $this->token = $token;
        $this->save();
    }

    public function verify(){
        $this->status = 1;
        $this->save();
    }
}
