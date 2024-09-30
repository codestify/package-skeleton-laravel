<?php

namespace Manza\Paisa\Contracts;

use Omnipay\Common\Message\RequestInterface as OmnipayRequest;

interface PaymentGateway
{
    public function purchase(array $parameters): OmnipayRequest;

    public function completePurchase(array $parameters): OmnipayRequest;

    public function authorize(array $parameters): OmnipayRequest;

    public function capture(array $parameters): OmnipayRequest;

    public function refund(array $parameters): OmnipayRequest;

    public function fetchTransaction(array $parameters): OmnipayRequest;

    public function createPlan(array $parameters): OmnipayRequest;

    public function createSubscription(array $parameters): OmnipayRequest;

    public function getSubscription(array $parameters): OmnipayRequest;

    public function createProduct(array $parameters): OmnipayRequest;
}
