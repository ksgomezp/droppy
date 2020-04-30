<?php

namespace App\Util;

use App\Interfaces\Payment;

class DirectPayment implements Payment
{
    public function pay($request)
    {
        // Restar a user.wallet, crear y guardar los items y el receipt.
        // Posiblemente tengamos que agregar otro parametro que seaa el userId
        // tanto aca como en la interfaz
    }
}
