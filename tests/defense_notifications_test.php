<?php
require_once __DIR__ . '/../request/notify/AlipayNotify.php';
require_once __DIR__ . '/../request/notify/AlipayDefenseStrategySuggestionNotify.php';
require_once __DIR__ . '/../request/notify/AlipayDefenseDocumentNotify.php';
require_once __DIR__ . '/../model/DisputeEvidenceRecommendation.php';
require_once __DIR__ . '/../model/DisputeDefenseFile.php';

function defenseCheck($condition) {
    if (!$condition) { throw new RuntimeException('Defense notification assertion failed'); }
}
// PHP Notify models use caller-owned hydration, as existing SDK notifications do.
function defenseHydrate($object, $data) {
    foreach ($data as $key => $value) {
        $setter = 'set' . ucfirst($key);
        if (method_exists($object, $setter)) { $object->$setter($value); }
    }
    return $object;
}
$strategy = json_decode('{"disputeId":"d1","notifyTime":"2026-10-22T01:02:03.123+08:00","winRateLevel":"FUTURE","evidenceList":[{"evidenceTag":"FUTURE_TAG","obtained":false,"winRateContribution":"FUTURE"},{"evidenceTag":"ORDER_INFORMATION","obtained":true}],"cardholderDisputeReason":"Reason","defenseStrategyDescription":"Supply evidence","futureField":{"ignored":true}}', true);
$document = json_decode('{"disputeId":"d1","notifyTime":"2026-10-22T01:02:03.123+08:00","defenseFile":{"fileName":"defense.pdf","fileFormat":"FUTURE","fileMd5":"5d41402abc4b2a76b9719d911017c592"},"winRateLevel":"FUTURE","recommendedEvidence":{"FUTURE_TAG":"提供材料","ORDER_INFORMATION":"Order proof"},"suggestionsForImprovement":"Add proof"}', true);
$items = [];
foreach ($strategy['evidenceList'] as $item) { $items[] = defenseHydrate(new \Model\DisputeEvidenceRecommendation(), $item); }
$s = defenseHydrate(new \Request\notify\AlipayDefenseStrategySuggestionNotify(), $strategy);
$s->setEvidenceList($items);
defenseCheck($s->getEvidenceList()[0]->getObtained() === false);
defenseCheck($s->getEvidenceList()[1]->getObtained() === true);
defenseCheck($s->getEvidenceList()[1]->getWinRateContribution() === null);
$d = defenseHydrate(new \Request\notify\AlipayDefenseDocumentNotify(), $document);
$d->setDefenseFile(defenseHydrate(new \Model\DisputeDefenseFile(), $document['defenseFile']));
// Check every supplied field, retaining false and dynamic map values.
unset($strategy['futureField']);
foreach ([[$strategy, $s], [$document, $d]] as $case) {
    $actual = json_decode(json_encode($case[1]), true);
    foreach ($case[0] as $key => $value) {
        if ($key === 'evidenceList') {
            foreach ($value as $i => $item) { foreach ($item as $k => $v) { defenseCheck($actual[$key][$i][$k] === $v); } }
        } else { defenseCheck($actual[$key] === $value); }
    }
}
$empty = new \Request\notify\AlipayDefenseDocumentNotify();
defenseCheck($empty->getWinRateLevel() === null && $empty->getRecommendedEvidence() === null && $empty->getSuggestionsForImprovement() === null);
defenseCheck((new \Model\DisputeEvidenceRecommendation())->getObtained() === null);
echo "Defense notifications: PASS\n";
