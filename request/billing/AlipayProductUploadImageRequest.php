<?php

namespace Request\billing;

use Request\AlipayFileRequest;

/** Request for uploading an image that can later be associated with a product. */
final class AlipayProductUploadImageRequest extends AlipayFileRequest
{
    private $productId;

    public function getProductId()
    {
        return $this->productId;
    }

    public function setProductId($productId)
    {
        $this->productId = $productId;
        return $this;
    }

}
