<?php
require_once __DIR__ . '/../request/notify/AlipayNotify.php';
require_once __DIR__ . '/../request/notify/AlipayDisputeNotify.php';

function checkTime($condition, $message) {
    if (!$condition) { throw new RuntimeException($message); }
}

foreach ([
    ['DISPUTE_CANCELLED', 'disputeCancelledTime', '2026-08-03T03:56:00+00:00'],
    ['DEFENSE_SUPPLIED', 'defenseSuppliedTime', '2022-09-22T01:10:05-07:00'],
] as $case) {
    $body = json_encode(['disputeId' => 'd1', 'disputeNotificationType' => $case[0], $case[1] => $case[2]]);
    $notify = new \Request\notify\AlipayDisputeNotify();
    foreach (json_decode($body, true) as $key => $value) { $notify->$key = $value; }
    $getter = 'get' . ucfirst($case[1]);
    $setter = 'set' . ucfirst($case[1]);
    checkTime($notify->$getter() === $case[2], 'Time/offset changed');
    checkTime($notify->getDisputeId() === 'd1', 'Existing field lost');
    $encoded = json_decode(json_encode($notify), true);
    checkTime($encoded[$case[1]] === $case[2], 'Wire key/time changed');
    $notify->$setter(null);
    checkTime($notify->$getter() === null, 'Null setter failed');
    $notify->$setter($case[2]);
    checkTime($notify->$getter() === $case[2], 'String setter failed');
}
$legacy = new \Request\notify\AlipayDisputeNotify();
checkTime($legacy->getDisputeCancelledTime() === null, 'Missing cancellation time');
checkTime($legacy->getDefenseSuppliedTime() === null, 'Missing defense time');
echo "Dispute notify times: PASS\n";
