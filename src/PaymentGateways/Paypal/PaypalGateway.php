<?php

namespace Manza\Paisa\PaymentGateways\Paypal;

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
use Omnipay\Common\Http\ClientInterface;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\RequestInterface;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

final class PaypalGateway extends AbstractGateway
{
    public function __construct(ClientInterface $httpClient = null, HttpRequest $httpRequest = null)
    {
        parent::__construct($httpClient, $httpRequest);
        $this->initialize([
            'clientId' => config('paisa.gateways.paypal.client_id'),
            'secret' => config('paisa.gateways.paypal.client_secret'),
            'testMode' => config('paisa.gateways.paypal.sandbox'),
        ]);
    }

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

    public function purchase(array $options = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CreateOrderRequest::class, $options);
    }

    public function completePurchase(array $options = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CaptureOrderRequest::class, $options);
    }

    public function authorize(array $options = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(AuthorizeOrderRequest::class, $options);
    }

    public function capture(array $options = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CaptureAuthorizePaymentRequest::class, $options);
    }

    public function refund(array $options = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(RefundRequest::class, $options);
    }

    public function fetchTransaction(array $options = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(FetchTransactionRequest::class, $options);
    }

    public function getOrderDetails(array $options = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(GetOrderRequest::class, $options);
    }

    public function createPlan(array $options = array()): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CreatePlanRequest::class, $options);
    }

    public function createSubscription(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CreateSubscriptionRequest::class, $parameters);
    }

    public function getSubscription(array $parameters = []): RequestInterface|AbstractRequest
    {
        return $this->createRequest(GetSubscriptionRequest::class, $parameters);
    }

    public function createProduct(array $options = array()): RequestInterface|AbstractRequest
    {
        return $this->createRequest(CreateProductRequest::class, $options);
    }
}
