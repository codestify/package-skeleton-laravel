<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

use Omnipay\Common\Exception\InvalidRequestException;

class CreateOrderRequest extends Request
{
    /**
     * @throws InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('amount', 'currency', 'returnUrl', 'cancelUrl');

        return [
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => $this->getReturnUrl(),
                'cancel_url' => $this->getCancelUrl(),
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => $this->getCurrency(),
                        'value' => $this->getAmount(),
                    ],
                ],
            ],
        ];
    }

    protected function getEndpointPath(): string
    {
        return '/checkout/orders';
    }
}
