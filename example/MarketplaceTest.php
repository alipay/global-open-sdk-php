<?php

use Request\marketplace\AlipayRegisterRequest;

function register()
{
    $alipayRegisterRequest = new AlipayRegisterRequest();
    $alipayRegisterRequest->setRegistrationRequestId();
}