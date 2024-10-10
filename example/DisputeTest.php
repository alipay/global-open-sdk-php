<?php

require '../init.php';

use Client\DefaultAlipayClient;


const clientId = "";
const merchantPrivateKey = "";
const alipayPublicKey = "";
const gatewayUrl = "";


function acceptDispute($disputeId)
{
    $alipayAcceptDisputeRequest = new \Request\dispute\AlipayAcceptDisputeRequest();
    $alipayAcceptDisputeRequest->setDisputeId($disputeId);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($alipayAcceptDisputeRequest);

    echo json_encode($alipayResponse);
}


function supplyDefenseDocument($disputeId)
{
    $alipaySupplyDefenseDocumentRequest = new \Request\dispute\AlipaySupplyDefenseDocumentRequest();
    $alipaySupplyDefenseDocumentRequest->setDisputeId($disputeId);
    $alipaySupplyDefenseDocumentRequest->setDisputeEvidence("test");

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($alipaySupplyDefenseDocumentRequest);

    echo json_encode($alipayResponse);
}


function downloadDisputeEvidence($disputeId)
{
    $alipayDownloadDisputeEvidenceRequest = new \Request\dispute\AlipayDownloadDisputeEvidenceRequest();
    $alipayDownloadDisputeEvidenceRequest->setDisputeId($disputeId);
    $alipayDownloadDisputeEvidenceRequest->setDisputeEvidenceType(\Model\DisputeEvidenceType::DISPUTE_EVIDENCE_TEMPLATE);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($alipayDownloadDisputeEvidenceRequest);

    echo json_encode($alipayResponse);
}
