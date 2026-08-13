<?php

namespace Response\billing;

/** DTO for the product image upload response. */
class AlipayProductUploadImageResponse implements \JsonSerializable
{
    private $result;
    private $imageUrl;
    private $imageName;
    private $productId;

    public function __construct(array $data = [])
    {
        $this->result = isset($data['result']) && is_array($data['result'])
            ? new \Model\Result($data['result'])
            : null;
        $this->imageUrl = $data['imageUrl'] ?? null;
        $this->imageName = $data['imageName'] ?? null;
        $this->productId = $data['productId'] ?? null;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    public function getImageName()
    {
        return $this->imageName;
    }

    public function getProductId()
    {
        return $this->productId;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'result' => $this->result,
            'imageUrl' => $this->imageUrl,
            'imageName' => $this->imageName,
            'productId' => $this->productId,
        ];
    }
}
