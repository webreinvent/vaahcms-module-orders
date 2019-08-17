<?php

//--------------------------------------------------
function vh_md_orders_statuses()
{

    $list = [
        'draft' => 'Draft',
        'pending' => 'Pending',
        'awaiting-payment' => 'Awaiting Payment',
        'awaiting-fulfillment' => 'Awaiting Fulfillment',
        'awaiting-shipment' => 'Awaiting Shipment',
        'awaiting-pickup' => 'Awaiting Pickup',
        'partially-shipped' => 'Partially Shipped',
        'completed' => 'Completed',
        'shipped' => 'Shipped',
        'cancelled' => 'Cancelled',
        'declined' => 'Declined',
        'refunded' => 'Refunded',
        'disputed' => 'Disputed',
        'manual-verification-required' => 'Manual Verification Required',
        'partially-refunded' => 'Partially Refunded',
    ];

    return $list;
}
//--------------------------------------------------
function vh_md_orders_payment_statuses()
{
    $list = [
        'pending' => "pending",
        'not-applicable' => "Not Applicable",
        'not-paid' => "Not Applicable",
        'authorized' => "Authorized",
        'part-paid' => "Part Paid",
        'paid' => "Paid",
    ];

    return $list;

}
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
//--------------------------------------------------
