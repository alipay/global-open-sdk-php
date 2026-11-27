<?php

namespace Request\notify;

/**
 * CREDIT_NOTE_RESULT payload. Uses caller-owned hydration through public properties or setters.
 * Inherited result is the shared Antom Result payload; ACK is a separate Result envelope with
 * resultCode=SUCCESS, resultStatus=S and resultMessage=success.
 */
class AlipayCreditNoteNotify extends \Request\notify\AlipayNotify
{
    /** Required creation request ID shared by all events; correlation, not delivery deduplication.
     * Delivery deduplication uses outer notify_id, which is not a payload member. */
    public $creditNoteRequestId;
    public $creditNoteNotificationType;
    public $customerId;
    /** @var \Model\CreditNoteInfo|null Notification projection without detail-only metadata. */
    public $creditNote;
    /** @var \Model\NotifyInvoiceInfo|null */
    public $invoice;

    public function getCreditNoteRequestId()
    {
        return $this->creditNoteRequestId;
    }

    public function setCreditNoteRequestId($creditNoteRequestId): void
    {
        $this->creditNoteRequestId = $creditNoteRequestId;
    }

    public function getCreditNoteNotificationType()
    {
        return $this->creditNoteNotificationType;
    }

    public function setCreditNoteNotificationType($creditNoteNotificationType): void
    {
        $this->creditNoteNotificationType = $creditNoteNotificationType;
    }

    public function getCustomerId()
    {
        return $this->customerId;
    }

    public function setCustomerId($customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getCreditNote()
    {
        return $this->creditNote;
    }

    public function setCreditNote($creditNote): void
    {
        $this->creditNote = $creditNote;
    }

    public function getInvoice()
    {
        return $this->invoice;
    }

    public function setInvoice($invoice): void
    {
        $this->invoice = $invoice;
    }
}
