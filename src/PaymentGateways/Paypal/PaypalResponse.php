<?php

namespace Manza\Paisa\PaymentGateways\Paypal;

use Manza\Paisa\Contracts\PaymentResponse;
use Omnipay\Common\Message\ResponseInterface;

final class PaypalResponse implements PaymentResponse
{
    protected ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    public function isSuccessful(): bool
    {
        return $this->response->isSuccessful();
    }

    public function getTransactionId(): ?string
    {
        return $this->response->getTransactionId();
    }

    public function getMessage(): ?string
    {
        return $this->response->getMessage();
    }

    public function getCode(): ?string
    {
        return $this->response->getCode();
    }

    public function getData(): array
    {
        return $this->response->getData();
    }

    public function getRedirectUrl(): ?string
    {
        return $this->response->getRedirectUrl();
    }

    public function isRedirect(): bool
    {
        return $this->response->isRedirect();
    }

}
