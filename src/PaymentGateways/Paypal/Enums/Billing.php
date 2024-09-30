<?php

namespace Manza\Paisa\PaymentGateways\Paypal\Enums;

enum Billing: string
{
    case PLAN_TYPE_FIXED = 'FIXED';
    case PLAN_TYPE_INFINITE = 'INFINITE';
    case PLAN_FREQUENCY_DAY = 'DAY';
    case PLAN_FREQUENCY_WEEK = 'WEEK';
    case PLAN_FREQUENCY_MONTH = 'MONTH';
    case PLAN_FREQUENCY_YEAR = 'YEAR';
    case PLAN_STATE_CREATED = 'CREATED';
    case PLAN_STATE_ACTIVE = 'ACTIVE';
    case PLAN_STATE_INACTIVE = 'INACTIVE';
    case PLAN_STATE_DELETED = 'DELETED';
}
