<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

class CreatePlanRequest extends Request
{
    protected string $v1LiveEndpoint = 'https://api-m.paypal.com/v1';

    protected string $v1TestEndpoint = 'https://api-m.sandbox.paypal.com/v1';

    public function getProductId(): string
    {
        return $this->getParameter('product_id');
    }

    public function setProductId($value): CreatePlanRequest
    {
        return $this->setParameter('product_id', $value);
    }

    public function getName(): string
    {
        return $this->getParameter('name');
    }

    public function setName($value): CreatePlanRequest
    {
        return $this->setParameter('name', $value);
    }

    public function getStatus(): string
    {
        return $this->getParameter('status');
    }

    public function setStatus($value): CreatePlanRequest
    {
        return $this->setParameter('status', $value);
    }

    public function getBillingCycles(): array
    {
        return $this->getParameter('billing_cycles');
    }

    public function setBillingCycles(array $value): CreatePlanRequest
    {
        return $this->setParameter('billing_cycles', $value);
    }

    public function getPaymentPreferences(): ?array
    {
        return $this->getParameter('payment_preferences');
    }

    public function setPaymentPreferences(array $value): CreatePlanRequest
    {
        return $this->setParameter('payment_preferences', $value);
    }

    public function getTaxes(): ?array
    {
        return $this->getParameter('taxes');
    }

    public function setTaxes(array $value): CreatePlanRequest
    {
        return $this->setParameter('taxes', $value);
    }

    public function getData(): array
    {
        $this->validate('product_id', 'name', 'description', 'status', 'billing_cycles');

        return [
            'product_id' => $this->getProductId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'status' => $this->getStatus(),
            'billing_cycles' => $this->getBillingCycles(),
            'payment_preferences' => $this->getPaymentPreferences(),
            'taxes' => $this->getTaxes(),
        ];
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->v1TestEndpoint : $this->v1LiveEndpoint;
    }

    protected function getEndpointPath(): string
    {
        return '/billing/plans';
    }
}
