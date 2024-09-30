<?php

namespace Manza\Paisa;

use Illuminate\Support\Manager;
use Manza\Paisa\PaymentGateways\Paypal\PaypalGateway;

class PaisaManager extends Manager
{
    public function createPaypalDriver()
    {
        $paypalGateway = new PaypalGateway;
        $paypalGateway->initialize([
            'clientId' => config('paisa.gateways.paypal.client_id'),
            'secret' => config('paisa.gateways.paypal.client_secret'),
            'testMode' => config('paisa.gateways.paypal.sandbox'),
        ]);

        return $paypalGateway;
    }

    public function createStripeDriver()
    {
        //        return new StripeGateway($this->container->make('stripe.config'));
    }

    public function createGocardlessDriver()
    {
        //        return new GoCardlessGateway($this->container->make('gocardless.config'));
    }

    public function getDefaultDriver()
    {
        return $this->config->get('paisa.default', 'paypal');
    }
}
