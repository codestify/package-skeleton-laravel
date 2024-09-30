<?php

namespace Manza\Paisa;

use Manza\Paisa\Contracts\PaymentGateway;
use Omnipay\Common\Message\ResponseInterface;

class Paisa
{
    protected PaymentGateway $gateway;
    protected PaisaManager $manager;

    public function __construct(PaisaManager $manager)
    {
        $this->manager = $manager;
    }

    public function make(string $driver = null): self
    {
        $this->gateway = $this->manager->driver($driver);

        return $this;
    }

    public function purchase(array $parameters): ResponseInterface
    {
        return $this->gateway->purchase($parameters)->send();
    }

    public function complete(array $parameters): ResponseInterface
    {
        return $this->gateway->completePurchase($parameters)->send();
    }

    public function authorize(array $parameters): ResponseInterface
    {
        return $this->gateway->authorize($parameters)->send();
    }

    public function capture(array $parameters): ResponseInterface
    {
        return $this->gateway->capture($parameters)->send();
    }

    public function refund(array $parameters): ResponseInterface
    {
        return $this->gateway->refund($parameters)->send();
    }

    public function fetchTransaction(array $parameters): ResponseInterface
    {
        return $this->gateway->fetchTransaction($parameters)->send();
    }

    public function createPlan(array $parameters): ResponseInterface
    {
        return $this->gateway->createPlan($parameters)->send();
    }

    public function createSubscription(array $parameters): ResponseInterface
    {
        return $this->gateway->createSubscription($parameters)->send();
    }

    public function getSubscription(array $parameters): ResponseInterface
    {
        return $this->gateway->getSubscription($parameters)->send();
    }

    public function createProduct(array $parameters): ResponseInterface
    {
        return $this->gateway->createProduct($parameters)->send();
    }
}
