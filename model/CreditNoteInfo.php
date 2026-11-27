<?php

namespace Model;

/** Credit note notification projection; caller-owned hydration, with string timestamps. */
class CreditNoteInfo
{
    public $creditNoteId;
    public $type;
    public $status;
    public $totalAmount;
    /** @var \Model\Amount|null Planned original-method refund for refund-bearing POST_PAYMENT.
     * Absent/null for note-only POST_PAYMENT and PRE_PAYMENT; not proof of completion. */
    public $refundAmount;
    /** @var string|null Optional REFUND_INITIATED, REFUND_SUCCEEDED or REFUND_FAILED progress.
     * Absent/null before progress or for note-only notes; PRE_PAYMENT may use NOT_APPLICABLE. */
    public $refundStatus;
    /** @var string|null Payment-system reference when obtained; alone does not prove success.
     * Absent/null beforehand, for note-only POST_PAYMENT and PRE_PAYMENT. */
    public $refundId;
    /** @var string|null Optional REFUND routing supplied at creation; null when omitted. */
    public $refundDestination;
    public $reason;
    public $reasonDescription;
    public $memo;
    public $effectiveDate;
    public $issuedAt;
    public $refundedAt;
    public $voidedAt;
    public $createdAt;
    /**
     * Notification line-item arrays only, excluding detail-only metadata. Optional, at most 100;
     * the service returns [] when absent. Quantity is an integer in quantity mode only (1-999).
     * Direction is an open string, required C or D; D itemAmount is subtracted from the total.
     * @var array<int,array{creditNoteItemId?:string,type?:string,invoiceItemId?:string,description?:string,quantity?:int,direction:string,unitAmount?:\Model\Amount,itemAmount?:\Model\Amount}>|null
     */
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
        if ($items === null) {
            $this->items = null;
            return;
        }
        $fields = array_fill_keys([
            'creditNoteItemId', 'type', 'invoiceItemId', 'description',
            'quantity', 'direction', 'unitAmount', 'itemAmount'
        ], true);
        $this->items = array_map(function ($item) use ($fields) {
            if ($item instanceof LineItem) {
                $item = $item->toArray();
            } elseif (is_object($item)) {
                $item = get_object_vars($item);
            }
            return array_intersect_key($item, $fields);
        }, $items);
    }


}
