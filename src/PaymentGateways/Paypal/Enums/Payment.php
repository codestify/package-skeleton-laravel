<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Enums;

enum Payment: string
{
    case PAYMENT_TRIAL = 'TRIAL';
    case PAYMENT_REGULAR = 'REGULAR';
}
