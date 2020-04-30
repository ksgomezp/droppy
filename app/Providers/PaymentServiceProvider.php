<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Payment;
use App\Util\DirectPayment;

class PaymentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Payment::class, function () {
            return new DirectPayment();
        });
    }
}
