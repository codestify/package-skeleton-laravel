<?php

namespace Manza\Paisa;

use Illuminate\Support\Manager;
use Manza\Paisa\Contracts\PaymentGateway;
use Manza\Paisa\PaymentGateways\Paypal\PaypalGateway;

class PaymentManager extends Manager
{
    public function getDefaultDriver()
    {
        return $this->config->get('services.payment.default');
    }

    public function createPaypalDriver(): PaymentGateway
    {
        return app(PaypalGateway::class);
    }
}
