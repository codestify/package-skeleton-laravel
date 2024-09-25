<?php

namespace Manza\Paisa\PaymentGateways\Paypal;

use Manza\Paisa\Contracts\PaymentGateway;
use Manza\Paisa\Contracts\PaymentResponse;

use Omnipay\Omnipay;
use Omnipay\PayPal\RestGateway;

final class PaypalGateway implements PaymentGateway
{
    protected RestGateway $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(config('services.paypal.client_id'));
        $this->gateway->setSecret(config('services.paypal.secret'));
        $this->gateway->setTestMode(config('services.paypal.sandbox'));
    }

    public function initialize(array $parameters): self
    {
        foreach ($parameters as $key => $value) {
            $this->gateway->setParameter($key, $value);
        }
        return $this;
    }

    public function purchase(float $amount, array $parameters): PaymentResponse
    {
        $response = $this->gateway->purchase([
            'amount' => $amount,
            'currency' => $parameters['currency'] ?? 'GBP',
            'description' => $parameters['description'] ?? '',
            'returnUrl' => $parameters['returnUrl'],
            'cancelUrl' => $parameters['cancelUrl'],
        ])->send();

        return new PaypalResponse($response);
    }

    public function authorize(float $amount, array $parameters): PaymentResponse
    {
        $response = $this->gateway->authorize([
            'amount' => $amount,
            'currency' => $parameters['currency'] ?? 'GBP',
            'description' => $parameters['description'] ?? '',
            'returnUrl' => $parameters['returnUrl'],
            'cancelUrl' => $parameters['cancelUrl'],
        ])->send();

        return new PaypalResponse($response);
    }

    public function capture(float $amount, string $transactionId, array $parameters): PaymentResponse
    {
        $response = $this->gateway->capture([
            'amount' => $amount,
            'currency' => $parameters['currency'] ?? 'USD',
            'transactionReference' => $transactionId,
        ])->send();

        return new PaypalResponse($response);
    }

    public function refund(float $amount, array $parameters): PaymentResponse
    {
        $response = $this->gateway->refund([
            'amount' => $amount,
            'currency' => $parameters['currency'] ?? 'USD',
            'transactionReference' => $parameters['transactionId'],
        ])->send();

        return new PaypalResponse($response);
    }

    public function void(array $parameters): PaymentResponse
    {
        $response = $this->gateway->void([
            'transactionReference' => $parameters['transactionId'],
        ])->send();

        return new PaypalResponse($response);
    }

}

