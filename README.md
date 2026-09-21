# Antom SDK for PHP

Latest release: **1.6.1**

## Installation

```sh
composer require antom/global-open-sdk-php
```

Requires the JSON, OpenSSL, and cURL extensions.

## Quick start

- **API Key:** follow the [setup guide](docs/api-key-client.md) and run the [sandbox example](example/ApiKeyPaymentSession.php).
- **RSA:** start with the [payment example](example/PayTest.php).
- Browse [more examples](example) and the [API documentation](https://global.alipay.com/docs/).

API Key and RSA clients share request/response models. File uploads and notification
verification still require RSA credentials.

## Upgrade notes

Gateway responses with `resultStatus S` must be signed; responses with only one
of the signature and response-time headers are rejected.

Billing integrations: `availableAmount` now uses `Amount`; the `AvailableAmount`
model has been removed.

## Meter event upload

`meter/uploadEvent` requires HTTP/2 and `X-Session-Id`. See the
[usage and requirements](docs/meter-event-upload.md).

## Support

For integration questions, contact overseas_support@service.alibaba.com.
