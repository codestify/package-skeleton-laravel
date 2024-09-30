<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

use Manza\Paisa\Contracts\PaymentResponse;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class Response extends AbstractResponse implements PaymentResponse
{
    protected mixed $statusCode;

    public function __construct(RequestInterface $request, $data, $statusCode = 200)
    {
        parent::__construct($request, $data);
        $this->statusCode = $statusCode;
    }

    public function isSuccessful(): bool
    {
        return in_array($this->statusCode, [200, 201, 202, 204]) && ! $this->isRedirect();
    }

    public function isRedirect(): bool
    {
        return isset($this->data['links']) && $this->getRedirectUrl() !== null;
    }

    public function getTransactionReference(): mixed
    {
        return $this->data['id'] ?? null;
    }

    public function getMessage(): ?string
    {
        if (isset($this->data['error_description'])) {
            return $this->data['error_description'];
        }

        if (isset($this->data['message'])) {
            return $this->data['message'];
        }

        return null;
    }

    public function getCode(): ?string
    {
        return $this->data['error'] ?? null;
    }

    public function getRedirectUrl(): ?string
    {
        if (isset($this->data['links'])) {
            foreach ($this->data['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return $link['href'];
                }
            }
        }

        return null;
    }

    public function getRedirectMethod(): string
    {
        return 'GET';
    }

    public function getRedirectData(): null
    {
        return null;
    }
}
