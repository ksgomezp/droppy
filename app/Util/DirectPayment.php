<?php

namespace App\Util;

use App\User;
use App\Interfaces\Payment;
use Illuminate\Support\Facades\Auth;

class DirectPayment implements Payment
{
    public function pay($amount)
    {
        $user = User::findOrFail(Auth::user()->id);

        if ($user->getWallet() >= $amount) {
            $user->setWallet($user->getWallet() - $amount);
            $user->save();
            
            return true;
        }

        return false;
    }
}
