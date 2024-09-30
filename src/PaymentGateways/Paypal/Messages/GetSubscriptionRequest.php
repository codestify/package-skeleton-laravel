<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

class GetSubscriptionRequest extends Request
{
    protected $v1LiveEndpoint = 'https://api-m.paypal.com/v1';

    protected $v1TestEndpoint = 'https://api-m.sandbox.paypal.com/v1';

    public function getData(): array
    {
        $this->validate('subscription_id');

        return [];
    }

    public function getEndpoint(): string
    {
        return $this->getTestMode() ? $this->v1TestEndpoint : $this->v1LiveEndpoint;
    }

    protected function getEndpointPath(): string
    {
        return '/billing/subscriptions/'.$this->getSubscriptionId();
    }

    protected function getHttpMethod(): string
    {
        return 'GET';
    }

    public function setSubscriptionId(string $value): self
    {
        return $this->setParameter('subscription_id', $value);
    }

    public function getSubscriptionId(): ?string
    {
        return $this->getParameter('subscription_id');
    }
}
