<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class Response extends AbstractResponse
{
    protected mixed $statusCode;

    public function __construct(RequestInterface $request, $data, $statusCode = 200)
    {
        $data = is_array($data) ? $data : json_decode($data, true);
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

    public function getTransactionReference()
    {
        return $this->data['id'] ?? null;
    }

    public function getMessage()
    {
        if (isset($this->data['error_description'])) {
            return $this->data['error_description'];
        }

        if (isset($this->data['message'])) {
            return $this->data['message'];
        }

        return null;
    }

    public function getCode()
    {
        return $this->data['error'] ?? null;
    }

    public function getRedirectUrl()
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
