# Entry-code payment example

`EntryCodePaymentTest.php` requires your own sandbox integration settings:

| Environment variable | Value |
| --- | --- |
| `ANTOM_GATEWAY_URL` | Your regional HTTPS gateway URL |
| `ANTOM_CLIENT_ID` | Your sandbox client ID |
| `ANTOM_MERCHANT_PRIVATE_KEY` | Base64 body of your merchant private key |
| `ANTOM_PUBLIC_KEY` | Base64 body of the Antom public key |

Use the existing `ANTOM_PUBLIC_KEY` name used by the SDK README. Supply values
through your server environment or secret manager; do not store them in this
repository. Key values must omit the `BEGIN`/`END` PEM lines. Both a single-line
Base64 body and a body containing actual line breaks are accepted. If supplying
multiline values through a shell, quote the entire value and preserve its line
breaks; do not replace them with literal backslash-n text.

Install the Composer dependencies, configure all four variables, replace the
sample order and callback values, then run:

```sh
php example/EntryCodePaymentTest.php
```

This example sends a payment request. Use your own sandbox settings. Missing
configuration stops execution before a request is sent; the error names the
missing variable and does not print its value. No shared credentials are supplied.

For a local check without contacting a gateway, run
`php tests/entry_code_example_test.php`. It generates temporary key pairs in
memory and mocks the transport while exercising the actual example and signature
verification. This does not validate the sample business data against a live gateway.
