<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

class GetOrderRequest extends Request
{
    public function getData(): array
    {
        $this->validate('transactionReference');

        return [];
    }

    protected function getEndpointPath(): string
    {
        return '/checkout/orders/'.$this->getTransactionReference();
    }

    protected function getHttpMethod(): string
    {
        return 'GET';
    }
}
