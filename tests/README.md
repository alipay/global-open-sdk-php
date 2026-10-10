# PHP type metadata regression tests

Run `php tests/deserialization.php` from the SDK root. No network or test framework is required.

The test covers generated model/request/response JSON roundtrips, runtime type resolution, enum wrappers and unknown values, legacy type names, object arrays/maps, and absent/null/false/zero/empty values. Handwritten requests with mandatory constructor arguments are excluded from automatic discovery.

To compare request serialization against a previous checkout:

```sh
php tests/deserialization.php /path/to/old-sdk --snapshot > before.json
php tests/deserialization.php . --snapshot > after.json
cmp before.json after.json
```

Generation requires automation with the `PHPRuntimeType` helper. Merge the accompanying automation PR before merging these templates or running remote generation.

The suite also runs `serializer_boundaries.php`: legitimate discriminator subclasses, absent/unknown/non-subclass fallback, ordinary models with enum-like methods, external/private and incomplete/public wrappers, and missing-discriminator failures. Enum recognition remains structural; a future non-model class with exactly the same generated-enum shape would require a new explicit distinction.

Runtime compatibility is tested with the existing model metadata unchanged. Bulk metadata renaming is deferred to the next automation run. Both old `\request\model\` and canonical `\Model\` names are supported by the serializer.

Use `php tests/deserialization.php /path/to/generated-sdk --require-canonical-types` as a separate metadata audit. It fails while legacy names remain; this is independent of runtime compatibility. Seven historical files were not rewritten by the current service generation: `model/Event.php`, `model/BillingSubscriptionTrialSettings.php`, `model/Payment.php`, `model/LineItem.php`, `model/MeterEventBatch.php`, `request/billing/AlipayMeterUploadEventRequest.php`, and `response/billing/AlipayMeterUploadEventResponse.php`. Runtime normalization also covers these files.
