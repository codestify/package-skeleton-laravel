<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

class RefundRequest extends Request
{
    public function getData(): array
    {
        $this->validate('transactionReference');

        $data = [];

        if ($this->getAmount()) {
            $data['amount'] = [
                'value' => $this->getAmount(),
                'currency_code' => $this->getCurrency(),
            ];
        }

        return $data;
    }

    protected function getEndpointPath(): string
    {
        return '/payments/captures/' . $this->getTransactionReference() . '/refund';
    }
}
