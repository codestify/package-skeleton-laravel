<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Messages;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest as OmnipayAbstractRequest;
use Omnipay\Common\Message\ResponseInterface;

abstract class Request extends OmnipayAbstractRequest
{
    protected $liveEndpoint = 'https://api-m.paypal.com/v2';
    protected $testEndpoint = 'https://api-m.sandbox.paypal.com/v2';

    public function getClientId()
    {
        return $this->getParameter('clientId');
    }

    public function setClientId($value)
    {
        return $this->setParameter('clientId', $value);
    }

    public function getSecret()
    {
        return $this->getParameter('secret');
    }

    public function setSecret($value)
    {
        return $this->setParameter('secret', $value);
    }

    public function sendData($data): ResponseInterface|Response
    {
        ray([
            'method' => $this->getHttpMethod(),
            'uri' => $this->getEndpoint().$this->getEndpointPath(),
            'headers' => [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer '.$this->getAccessToken(),
            ],
            'body' => $data,
        ]);
        try {
            $httpResponse = $this->httpClient->request(
                method: $this->getHttpMethod(),
                uri: $this->getEndpoint().$this->getEndpointPath(),
                headers: [
                    'Content-Type'  => 'application/json',
                    'Authorization' => 'Bearer '.$this->getAccessToken(),
                ],
                body: $this->isDataValid($data) ? json_encode($data) : null,
            );
        } catch (\Exception $e) {
            throw new InvalidRequestException(
                'Error communicating with payment gateway: '.$e->getMessage(),
                $e->getCode()
            );
        }

        return $this->createResponse($this->decodeResponse($httpResponse), $httpResponse->getStatusCode());
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    abstract protected function getEndpointPath();

    protected function getHttpMethod(): string
    {
        return 'POST';
    }

    protected function getAccessToken()
    {
        $url = ($this->getTestMode() ? 'https://api-m.sandbox.paypal.com' : 'https://api-m.paypal.com').'/v1/oauth2/token';

        $authString = base64_encode($this->getClientId().':'.$this->getSecret());

        $headers = [
            'Accept'          => 'application/json',
            'Accept-Language' => 'en_GB',
            'Content-Type'    => 'application/x-www-form-urlencoded',
            'Authorization'   => 'Basic '.$authString,
        ];

        $body = 'grant_type=client_credentials';

        try {
            // Pass headers and body as part of the options array
            $httpResponse = $this->httpClient->request(
                method: 'POST',
                uri: $url,
                headers: $headers,
                body: $body
            );

            $response = $this->decodeResponse($httpResponse);

            if ( ! isset($response['access_token'])) {
                throw new InvalidRequestException('Unable to obtain access token from PayPal. Response: '.json_encode($response));
            }

            return $response['access_token'];
        } catch (\Exception $e) {
            throw new InvalidRequestException(
                'Error obtaining access token: '.$e->getMessage().'. ClientID: '.substr($this->getClientId(), 0,
                    5).'...',
                $e->getCode()
            );
        }
    }

    protected function createResponse($data, $statusCode): Response
    {
        return $this->response = new Response($this, $data, $statusCode);
    }

    protected function isDataValid($data): bool
    {
        return isset($data) && ( ! is_array($data) || ! empty($data));
    }

    /**
     * @param  \Psr\Http\Message\ResponseInterface  $httpResponse
     *
     * @return mixed|ResponseInterface
     */
    public function decodeResponse(\Psr\Http\Message\ResponseInterface $httpResponse): mixed
    {
        return json_decode($httpResponse->getBody()->getContents(), true);
    }
}
