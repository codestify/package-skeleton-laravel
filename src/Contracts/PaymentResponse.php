<?php

namespace Manza\Paisa\Contracts;

interface PaymentResponse
{
    /**
     * Returns whether the payment was successful
     */
    public function isSuccessful();

    /**
     * Returns the transaction ID
     */
    public function getTransactionId();

    /**
     * Returns any message associated with the response
     */
    public function getMessage();

    /**
     * Returns any code associated with the response
     */
    public function getCode();

    /**
     * Returns the full data array of the response
     */
    public function getData();

    /**
     * Returns the redirect URL if the payment requires a redirect
     */
    public function getRedirectUrl();

    /**
     * Returns whether the payment requires a redirect
     */
    public function isRedirect();
}
