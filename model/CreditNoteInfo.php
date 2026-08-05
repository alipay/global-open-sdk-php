<?php

namespace Model;

class CreditNoteInfo
{
    public $creditNoteId;
    public $type;
    public $status;
    public $totalAmount;
    public $refundAmount;
    public $refundStatus;
    public $refundId;
    public $refundDestination;
    public $reason;
    public $reasonDescription;
    public $memo;
    public $effectiveDate;
    public $issuedAt;
    public $refundedAt;
    public $voidedAt;
    public $createdAt;
    public $items;

    /**
     * @return mixed
     */
    public function getCreditNoteId()
    {
        return $this->creditNoteId;
    }

    /**
     * @param mixed $creditNoteId
     */
    public function setCreditNoteId($creditNoteId)
    {
        $this->creditNoteId = $creditNoteId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * @param mixed $totalAmount
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @return mixed
     */
    public function getRefundAmount()
    {
        return $this->refundAmount;
    }

    /**
     * @param mixed $refundAmount
     */
    public function setRefundAmount($refundAmount)
    {
        $this->refundAmount = $refundAmount;
    }

    /**
     * @return mixed
     */
    public function getRefundStatus()
    {
        return $this->refundStatus;
    }

    /**
     * @param mixed $refundStatus
     */
    public function setRefundStatus($refundStatus)
    {
        $this->refundStatus = $refundStatus;
    }

    /**
     * @return mixed
     */
    public function getRefundId()
    {
        return $this->refundId;
    }

    /**
     * @param mixed $refundId
     */
    public function setRefundId($refundId)
    {
        $this->refundId = $refundId;
    }

    /**
     * @return mixed
     */
    public function getRefundDestination()
    {
        return $this->refundDestination;
    }

    /**
     * @param mixed $refundDestination
     */
    public function setRefundDestination($refundDestination)
    {
        $this->refundDestination = $refundDestination;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @param mixed $reason
     */
    public function setReason($reason)
    {
        $this->reason = $reason;
    }

    /**
     * @return mixed
     */
    public function getReasonDescription()
    {
        return $this->reasonDescription;
    }

    /**
     * @param mixed $reasonDescription
     */
    public function setReasonDescription($reasonDescription)
    {
        $this->reasonDescription = $reasonDescription;
    }

    /**
     * @return mixed
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @param mixed $memo
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;
    }

    /**
     * @return mixed
     */
    public function getEffectiveDate()
    {
        return $this->effectiveDate;
    }

    /**
     * @param mixed $effectiveDate
     */
    public function setEffectiveDate($effectiveDate)
    {
        $this->effectiveDate = $effectiveDate;
    }

    /**
     * @return mixed
     */
    public function getIssuedAt()
    {
        return $this->issuedAt;
    }

    /**
     * @param mixed $issuedAt
     */
    public function setIssuedAt($issuedAt)
    {
        $this->issuedAt = $issuedAt;
    }

    /**
     * @return mixed
     */
    public function getRefundedAt()
    {
        return $this->refundedAt;
    }

    /**
     * @param mixed $refundedAt
     */
    public function setRefundedAt($refundedAt)
    {
        $this->refundedAt = $refundedAt;
    }

    /**
     * @return mixed
     */
    public function getVoidedAt()
    {
        return $this->voidedAt;
    }

    /**
     * @param mixed $voidedAt
     */
    public function setVoidedAt($voidedAt)
    {
        $this->voidedAt = $voidedAt;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }


}
