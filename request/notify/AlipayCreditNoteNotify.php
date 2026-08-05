<?php

namespace Request\notify;

class AlipayCreditNoteNotify extends \Request\notify\AlipayNotify
{
    public $notifyId;
    public $creditNoteRequestId;
    public $creditNoteNotificationType;
    public $customerId;
    public $creditNote;
    public $invoice;

    public function getNotifyId()
    {
        return $this->notifyId;
    }

    public function setNotifyId($notifyId): void
    {
        $this->notifyId = $notifyId;
    }

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
