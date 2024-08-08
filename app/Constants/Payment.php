<?php
namespace App\Constants;

class Payment {
    const PAYMENT_METHOD = [
      'cash' => 'Наличные',
      'card' => 'Карта',
    ];
    const PAYMENT_METHOD_KEYS = [
        'cash',
        'card',
    ];

    const VALUTE = 'сом';
    const PRICE_ID = 'entity_payment_id';
    const ENTITY_PAYMENT_TYPE_MEMBER = 'member_payment';
    const ENTITY_PAYMENT_TYPE_EVENT = 'event_payment';
}
