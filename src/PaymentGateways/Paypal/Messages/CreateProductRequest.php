<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

class CreateProductRequest extends Request
{
    protected $v1LiveEndpoint = 'https://api-m.paypal.com/v1';

    protected $v1TestEndpoint = 'https://api-m.sandbox.paypal.com/v1';

    public function getData()
    {
        $this->validate('name', 'type');

        return [
            'name' => $this->getName(),
            'type' => $this->getType(),
            'description' => $this->getDescription(),
        ];
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->v1TestEndpoint : $this->v1LiveEndpoint;
    }

    protected function getEndpointPath(): string
    {
        return '/catalogs/products';
    }

    protected function getName()
    {
        return $this->getParameter('name');
    }

    protected function getType()
    {
        return $this->getParameter('type');
    }

    public function setName($name): CreateProductRequest
    {
        return $this->setParameter('name', $name);
    }

    public function setType($type): CreateProductRequest
    {
        return $this->setParameter('type', $type);
    }
}
