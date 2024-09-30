<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

class CaptureAuthorizePaymentRequest extends Request
{
    public function getData(): array
    {
        $this->validate('transactionReference');

        return [];
    }

    protected function getEndpointPath(): string
    {
        return '/payments/authorizations/'.$this->getTransactionReference().'/capture';
    }
}
