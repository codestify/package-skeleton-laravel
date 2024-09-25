<?php

namespace Manza\Paisa\Contracts;

interface PaymentResponse
{
    /**
     * Returns whether the payment was successful
     *
     * @return bool
     */
    public function isSuccessful(): bool;

    /**
     * Returns the transaction ID
     *
     * @return string|null
     */
    public function getTransactionId(): ?string;

    /**
     * Returns any message associated with the response
     *
     * @return string|null
     */
    public function getMessage(): ?string;

    /**
     * Returns any code associated with the response
     *
     * @return string|null
     */
    public function getCode(): ?string;

    /**
     * Returns the full data array of the response
     *
     * @return array
     */
    public function getData(): array;

    /**
     * Returns the redirect URL if the payment requires a redirect
     *
     * @return string|null
     */
    public function getRedirectUrl(): ?string;

    /**
     * Returns whether the payment requires a redirect
     *
     * @return bool
     */
    public function isRedirect(): bool;
}
