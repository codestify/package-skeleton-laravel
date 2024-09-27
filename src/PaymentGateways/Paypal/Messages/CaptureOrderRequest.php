<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

class CaptureOrderRequest extends Request
{
    public function getData(): array
    {
        $this->validate('transactionReference');
        return [];
    }

    protected function getEndpointPath(): string
    {
        return '/checkout/orders/' . $this->getTransactionReference() . '/capture';
    }

    public function getHttpMethod(): string
    {
        return 'POST';
    }
}
