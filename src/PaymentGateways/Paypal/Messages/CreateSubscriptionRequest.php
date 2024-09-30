<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

use Omnipay\Common\Exception\InvalidRequestException;

class CreateSubscriptionRequest extends Request
{
    protected $liveEndpoint = 'https://api-m.paypal.com/v1';
    protected $testEndpoint = 'https://api-m.sandbox.paypal.com/v1';

    public function getData()
    {
        $this->validate('plan_id', 'subscriber', 'application_context');

        $data = [
            'plan_id' => $this->getPlanId(),
            'start_time' => $this->getStartTime(),
            'quantity' => $this->getQuantity(),
            'shipping_amount' => $this->getShippingAmount(),
            'subscriber' => $this->getSubscriber(),
            'application_context' => $this->getApplicationContext(),
        ];

        return array_filter($data);
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    protected function generateRequestId()
    {
        return 'SUBSCRIPTION-' . date('dmY') . '-' . uniqid();
    }


    public function setPlanId($value)
    {
        return $this->setParameter('plan_id', $value);
    }

    public function getPlanId()
    {
        return $this->getParameter('plan_id');
    }

    public function setStartTime($value)
    {
        return $this->setParameter('start_time', $value);
    }

    public function getStartTime()
    {
        return $this->getParameter('start_time');
    }

    public function setQuantity($value)
    {
        return $this->setParameter('quantity', $value);
    }

    public function getQuantity()
    {
        return $this->getParameter('quantity') ?? null;
    }

    public function setShippingAmount($value)
    {
        return $this->setParameter('shipping_amount', $value);
    }

    public function getShippingAmount(): mixed
    {
        return $this->getParameter('shipping_amount') ?? null;
    }

    public function setSubscriber($value)
    {
        return $this->setParameter('subscriber', $value);
    }

    public function getSubscriber()
    {
        return $this->getParameter('subscriber');
    }

    public function setApplicationContext($value)
    {
        return $this->setParameter('application_context', $value);
    }

    public function getApplicationContext()
    {
        return $this->getParameter('application_context');
    }


    protected function getEndpointPath(): string
    {
        return '/billing/subscriptions';
    }

    protected function getHttpMethod(): string
    {
        return 'POST';
    }
}
