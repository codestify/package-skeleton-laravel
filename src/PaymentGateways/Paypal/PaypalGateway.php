<?php

namespace Manza\Paisa\PaymentGateways\Paypal;

use Manza\Paisa\Contracts\PaymentGateway;
use Manza\Paisa\PaymentGateways\Paypal\Messages\AuthorizeOrderRequest;
use Manza\Paisa\PaymentGateways\Paypal\Messages\CaptureAuthorizePaymentRequest;
use Manza\Paisa\PaymentGateways\Paypal\Messages\CaptureOrderRequest;
use Manza\Paisa\PaymentGateways\Paypal\Messages\CreateOrderRequest;
use Manza\Paisa\PaymentGateways\Paypal\Messages\CreatePlanRequest;
use Manza\Paisa\PaymentGateways\Paypal\Messages\CreateProductRequest;
use Manza\Paisa\PaymentGateways\Paypal\Messages\CreateSubscriptionRequest;
use Manza\Paisa\PaymentGateways\Paypal\Messages\FetchTransactionRequest;
use Manza\Paisa\PaymentGateways\Paypal\Messages\GetOrderRequest;
use Manza\Paisa\PaymentGateways\Paypal\Messages\GetSubscriptionRequest;
use Manza\Paisa\PaymentGateways\Paypal\Messages\RefundRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;

final class PaypalGateway extends AbstractGateway implements PaymentGateway
{

    public function getName(): string
    {
        return 'PayPal REST V2';
    }

    public function getDefaultParameters(): array
    {
        return [
            'clientId' => '',
            'secret' => '',
            'testMode' => false,
        ];
    }

    public function getClientId()
    {
        return $this->getParameter('clientId');
    }

    public function setClientId($value): PaypalGateway
    {
        return $this->setParameter('clientId', $value);
    }

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function setSecret($value): PaypalGateway
    {
        return $this->setParameter('secret', $value);
    }

    public function getTestMode()
    {
        return $this->getParameter('testMode');
    }

    public function setTestMode($value): PaypalGateway
    {
        return $this->setParameter('testMode', $value);
    }

    public function purchase(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CreateOrderRequest::class, $parameters);
    }

    public function completePurchase(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CaptureOrderRequest::class, $parameters);
    }

    public function authorize(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(AuthorizeOrderRequest::class, $parameters);
    }

    public function capture(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CaptureAuthorizePaymentRequest::class, $parameters);
    }

    public function refund(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(RefundRequest::class, $parameters);
    }

    public function fetchTransaction(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(FetchTransactionRequest::class, $parameters);
    }

    public function getOrderDetails(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(GetOrderRequest::class, $parameters);
    }

    public function createPlan(array $parameters = array()): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CreatePlanRequest::class, $parameters);
    }

    public function createSubscription(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CreateSubscriptionRequest::class, $parameters);
    }

    public function getSubscription(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(GetSubscriptionRequest::class, $parameters);
    }

    public function createProduct(array $parameters = array()): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CreateProductRequest::class, $parameters);
    }
}
