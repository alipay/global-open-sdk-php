<?php


use Model\CustomerBelongsTo;
use Model\GrantType;
use Model\OsType;
use Model\ScopeType;
use Model\TerminalType;
use Request\auth\AlipayAuthApplyTokenRequest;
use Request\auth\AlipayAuthConsultRequest;
use Request\auth\AlipayAuthQueryTokenRequest;
use Request\auth\AlipayAuthRevokeTokenRequest;




const clientId = "";
const  merchantPrivateKey = "";
const  alipayPublicKey = "";
const gatewayUrl = "";

function applyToken($authCode)
{
    $request = new AlipayAuthApplyTokenRequest();
    $request->setGrantType(GrantType::AUTHORIZATION_CODE);
    $request->setCustomerBelongsTo(CustomerBelongsTo::ALIPAY_CN);
    $request->setAuthCode($authCode);

    $alipayClient = new DefaultAlipayClient(gatewayUrl, merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);

    print(json_encode($alipayResponse));

}

function authConsult()
{
    $request = new AlipayAuthConsultRequest();
    $request->setAuthRedirectUrl("https://www.taobao.com/?param1=567&param2=123");
    $request->setAuthState("dd1F6F6811f989DC7");
    $request->setCustomerBelongsTo(CustomerBelongsTo::ALIPAY_CN);
    $request->setOsType(OsType::ANDROID);
    $request->setOsVersion("6.6.6.6");
    $request->setScopes([ScopeType::AGREEMENT_PAY]);
    $request->setTerminalType(TerminalType::APP);

    $alipayClient = new DefaultAlipayClient(gatewayUrl, merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);

    print(json_encode($alipayResponse));
}

function queryToken($accessToken)
{
    $request = new AlipayAuthQueryTokenRequest();
    $request->setAccessToken($accessToken);

    $alipayClient = new DefaultAlipayClient(gatewayUrl, merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);

    print(json_encode($alipayResponse));

}


function revoke_token($accessToken)
{
    $request = new AlipayAuthRevokeTokenRequest();
    $request->setAccessToken($accessToken);

    $alipayClient = new DefaultAlipayClient(gatewayUrl, merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);

    print(json_encode($alipayResponse));
}


authConsult();
//applyToken("281001133029700579331362");
//revoke_token("28288803001247281723530452000N6krsDm8J8171000589");