# API Key client

Available on the current branch; not yet released as a package. The client accepts
a regional HTTPS gateway and a complete API Key. TEST/PROD paths are selected from
the key without modifying the request or decoding a ClientId.

## Run the sandbox example

From this repository root, configure:

| Environment variable | Value |
|---|---|
| `ANTOM_GATEWAY_URL` | Your regional HTTPS gateway, without an API path |
| `ANTOM_API_KEY` | A Restricted TEST key authorized for createPaymentSession |
| `ANTOM_NOTIFY_URL` | Your HTTPS notification endpoint |

The [example](../example/ApiKeyPaymentSession.php) creates one USD 1.00 CARD checkout session. It rejects
non-Restricted-TEST keys, generates a new request ID per run, prints the response
and exits unsuccessfully if the business result is not `SUCCESS / S`. For brevity,
it also uses the notification URL as the redirect URL; use your checkout return
page as the redirect URL in a real integration.

```sh
composer install
php example/ApiKeyPaymentSession.php
```

The printed response contains session credentials: print it only for local debugging.
Read API Keys from server-side configuration; never log them.

## Configuration and boundaries

Optional configuration keys: `connectTimeout` (15 seconds) and `timeout` (30 seconds total). Each ordinary request releases its cURL handle; the application CA bundle can be configured with `curl.cainfo`.

Ordinary requests verify TLS certificates and hostnames, reject redirects and do
not add automatic retries. Custom headers cannot override authentication headers.

- Existing RSA clients and business models remain available. Switching clients does not change the business request/response model.
- File uploads still require a separate RSA client.
- Session `uploadEvent` uses the existing HTTP/2 executor with only `X-Session-Id`, without Bearer or path rewriting. This example does not establish Billing/Meter permissions.
- Notifications still use the existing RSA verification tools and separately configured ClientId/public key. API Key is not a notification signing key.

The API Key Client and authentication/transport helpers are hand-maintained; preserve
them when regenerating business models.
