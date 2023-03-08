<?php

namespace App\Exceptions;

use Exception;

class TransactionException extends Exception
{
    public function render(){
        return response()->redirectTo('/dashboard')->with('error', $this->getMessage());
    }
}
