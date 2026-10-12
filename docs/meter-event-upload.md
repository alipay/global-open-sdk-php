# Meter event upload

`meter/createSession` uses the regular signed AMS transport. Use its session ID
to call `meter/uploadEvent` through `executeWithHeaders`:

```php
$request = new \Request\billing\AlipayMeterUploadEventRequest([
    'meters' => $meters,
]);
$response = $client->executeWithHeaders($request, [
    'X-Session-Id' => $sessionId,
]);
```

The SDK sends `meter/uploadEvent` to the gateway URL configured on the client,
without sandbox path rewriting, request signing, response signature verification,
or automatic retries. This API requires an HTTP/2-enabled libcurl 8.10.0 or later.
