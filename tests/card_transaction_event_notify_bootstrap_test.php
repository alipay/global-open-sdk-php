<?php

// Preserve the pre-upgrade loading sequence for a model not registered in legacy init.php.
require __DIR__ . '/../init.php';
require __DIR__ . '/../model/EventMerchantInfo.php';

$notify = new \Request\notify\AlipayCardTransactionEventNotify();
$merchant = new \Model\EventMerchantInfo();
$merchant->setName('Example Merchant');
$notify->setMerchantInfo($merchant);
if ($notify->getMerchantInfo() !== $merchant
    || $notify->getMerchantInfo()->getName() !== 'Example Merchant') {
    throw new RuntimeException('Legacy bootstrap and explicit model loading changed');
}
echo "Card event legacy bootstrap upgrade: PASS\n";
