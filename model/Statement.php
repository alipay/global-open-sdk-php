<?php

namespace Model;

class Statement
{

    public   $statementId;
    public   $fundMoveDetail;

    /**
     * @return mixed
     */
    public function getStatementId()
    {
        return $this->statementId;
    }

    /**
     * @param mixed $statementId
     */
    public function setStatementId($statementId): void
    {
        $this->statementId = $statementId;
    }

    /**
     * @return mixed
     */
    public function getFundMoveDetail()
    {
        return $this->fundMoveDetail;
    }

    /**
     * @param mixed $fundMoveDetail
     */
    public function setFundMoveDetail($fundMoveDetail): void
    {
        $this->fundMoveDetail = $fundMoveDetail;
    }




}