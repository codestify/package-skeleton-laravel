<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

class CompletePurchaseRequest extends Request
{
    public function getData()
    {
        $this->validate('payerId', 'transactionReference');

        return [
            'payer_id' => $this->getPayerId(),
        ];
    }

    public function getEndpoint(): string
    {
        return parent::getEndpoint().'/payments/payment/'.$this->getTransactionReference().'/execute';
    }

    public function getPayerId()
    {
        return $this->getParameter('payerId');
    }

    public function setPayerId($value)
    {
        return $this->setParameter('payerId', $value);
    }

    protected function getEndpointPath(): string
    {
        return '/checkout/orders/'.$this->getTransactionReference().'/capture';
    }
}
