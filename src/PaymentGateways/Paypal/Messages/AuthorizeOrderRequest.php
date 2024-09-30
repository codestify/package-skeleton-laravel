<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

class AuthorizeOrderRequest extends Request
{
    public function getData(): array
    {
        $this->validate('transactionReference');

        return [];
    }

    protected function getEndpointPath(): string
    {
        return '/checkout/orders/'.$this->getTransactionReference().'/authorize';
    }
}
