<?php

namespace Model;

class TransactionType
{
    const PAYMENT = "PAYMENT";
    const REFUND = "REFUND";
    const CAPTURE = "CAPTURE";
    const CANCEL = "CANCEL";
    const AUTHORIZATION = "AUTHORIZATION";
    const VOID = "VOID";
}