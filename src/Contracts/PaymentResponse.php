<?php

namespace Manza\Paisa\Contracts;

interface PaymentResponse
{
    /**
     * Returns whether the payment was successful
     */
    public function isSuccessful(): bool;

    /**
     * Returns the transaction ID
     */
    public function getTransactionId(): ?string;

    /**
     * Returns any message associated with the response
     */
    public function getMessage(): ?string;

    /**
     * Returns any code associated with the response
     */
    public function getCode(): ?string;

    /**
     * Returns the full data array of the response
     */
    public function getData(): array;

    /**
     * Returns the redirect URL if the payment requires a redirect
     */
    public function getRedirectUrl(): ?string;

    /**
     * Returns whether the payment requires a redirect
     */
    public function isRedirect(): bool;
}
