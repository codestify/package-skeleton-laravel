<?php

namespace Manza\Paisa\Contracts;

interface PaymentGateway
{
    public function initialize(array $parameters): self;

    public function purchase(float $amount, array $parameters): PaymentResponse;

    public function authorize(float $amount, array $parameters): PaymentResponse;

    public function capture(float $amount, string $transactionId, array $parameters): PaymentResponse;

    public function refund(float $amount, array $parameters): PaymentResponse;

    public function void(array $parameters): PaymentResponse;
}
