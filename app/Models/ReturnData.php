<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ReturnData extends Model
{

    private $SequenceId;
    
    private $SubmissionId ;
    public function getSubmissionId() {
        return $this->SubmissionId  ;
    }

    public function setName($submissionId) {
        $this->SubmissionId = $submissionId ;
    }

    private $TaxYear ;
    public function getTaxYear() {
        return $this->TaxYear  ;
    }

    public function setTaxYear($taxYear) {
        $this->TaxYear = $taxYear ;
    }

    private $IsFederalFiling ;
    public function getIsFederalFiling() {
        return $this->IsFederalFiling  ;
    }

    public function setIsFederalFiling($isFederalFiling) {
        $this->IsFederalFiling = $isFederalFiling ;
    }

    private $IsStateFiling ;
    public function getIsStateFiling() {
        return $this->IsStateFiling  ;
    }

    public function setIsStateFiling($isStateFiling) {
        $this->IsStateFiling = $isStateFiling ;
    }

    private $IsPostal ;
    public function getIsPostal() {
        return $this->IsPostal  ;
    }

    public function setIsPostal($isPostal) {
        $this->IsPostal = $isPostal ;
    }

    private $IsOnlineAccess ;
    public function getIsOnlineAccess() {
        return $this->IsOnlineAccess  ;
    }

    public function setIsOnlineAccess($isOnlineAccess) {
        $this->IsOnlineAccess = $isOnlineAccess ;
    }

    private $IsTinMatching ;
    public function getIsTinMatching() {
        return $this->IsTinMatching  ;
    }

    public function setIsTinMatching($isTinMatching) {
        $this->IsTinMatching = $isTinMatching ;
    }

    private $IsScheduleFiling ;
    public function getIsScheduleFiling() {
        return $this->IsScheduleFiling  ;
    }

    public function setIsScheduleFiling($isScheduleFiling) {
        $this->IsScheduleFiling = $isScheduleFiling ;
    }

    

    /**
     * Get the value of SequenceId
     */ 
    public function getSequenceId()
    {
        return $this->SequenceId;
    }

    /**
     * Set the value of SequenceId
     *
     * @return  self
     */ 
    public function setSequenceId($SequenceId)
    {
        $this->SequenceId = $SequenceId;

        return $this;
    }
    private $Recipient;

    /**
     * Get the value of Recipient
     */ 
    public function getRecipient()
    {
        return $this->Recipient;
    }

    /**
     * Set the value of Recipient
     *
     * @return  self
     */ 
    public function setRecipient($Recipient)
    {
        $this->Recipient = $Recipient;

        return $this;
    }

    private $NECFormData;

    /**
     * Get the value of NECFormData
     */ 
    public function getNECFormData()
    {
        return $this->NECFormData;
    }

    /**
     * Set the value of NECFormData
     *
     * @return  self
     */ 
    public function setNECFormData($NECFormData)
    {
        $this->NECFormData = $NECFormData;

        return $this;
    }

    public function toArray() {
        return (array)$this;
    }
}