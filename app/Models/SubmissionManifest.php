<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SubmissionManifest extends Model
{
    private $IsFederalFiling, $IsOnlineAccess, $IsPostal, $IsScheduleFiling, $IsStateFiling, $IsTinMatching, $ScheduleFiling, $SubmissionId, $TaxYear;
    

    /**
     * Get the value of TaxYear
     */ 
    public function getTaxYear()
    {
        return $this->TaxYear;
    }

    /**
     * Set the value of TaxYear
     *
     * @return  self
     */ 
    public function setTaxYear($TaxYear)
    {
        $this->TaxYear = $TaxYear;

        return $this;
    }

    /**
     * Get the value of SubmissionId
     */ 
    public function getSubmissionId()
    {
        return $this->SubmissionId;
    }

    /**
     * Set the value of SubmissionId
     *
     * @return  self
     */ 
    public function setSubmissionId($SubmissionId)
    {
        $this->SubmissionId = $SubmissionId;

        return $this;
    }

    /**
     * Get the value of ScheduleFiling
     */ 
    public function getScheduleFiling()
    {
        return $this->ScheduleFiling;
    }

    /**
     * Set the value of ScheduleFiling
     *
     * @return  self
     */ 
    public function setScheduleFiling($ScheduleFiling)
    {
        $this->ScheduleFiling = $ScheduleFiling;

        return $this;
    }

    /**
     * Get the value of IsTinMatching
     */ 
    public function getIsTinMatching()
    {
        return $this->IsTinMatching;
    }

    /**
     * Set the value of IsTinMatching
     *
     * @return  self
     */ 
    public function setIsTinMatching($IsTinMatching)
    {
        $this->IsTinMatching = $IsTinMatching;

        return $this;
    }

    /**
     * Get the value of IsStateFiling
     */ 
    public function getIsStateFiling()
    {
        return $this->IsStateFiling;
    }

    /**
     * Set the value of IsStateFiling
     *
     * @return  self
     */ 
    public function setIsStateFiling($IsStateFiling)
    {
        $this->IsStateFiling = $IsStateFiling;

        return $this;
    }

    /**
     * Get the value of IsScheduleFiling
     */ 
    public function getIsScheduleFiling()
    {
        return $this->IsScheduleFiling;
    }

    /**
     * Set the value of IsScheduleFiling
     *
     * @return  self
     */ 
    public function setIsScheduleFiling($IsScheduleFiling)
    {
        $this->IsScheduleFiling = $IsScheduleFiling;

        return $this;
    }

    /**
     * Get the value of IsPostal
     */ 
    public function getIsPostal()
    {
        return $this->IsPostal;
    }

    /**
     * Set the value of IsPostal
     *
     * @return  self
     */ 
    public function setIsPostal($IsPostal)
    {
        $this->IsPostal = $IsPostal;

        return $this;
    }

    /**
     * Get the value of IsOnlineAccess
     */ 
    public function getIsOnlineAccess()
    {
        return $this->IsOnlineAccess;
    }

    /**
     * Set the value of IsOnlineAccess
     *
     * @return  self
     */ 
    public function setIsOnlineAccess($IsOnlineAccess)
    {
        $this->IsOnlineAccess = $IsOnlineAccess;

        return $this;
    }

    /**
     * Get the value of IsFederalFiling
     */ 
    public function getIsFederalFiling()
    {
        return $this->IsFederalFiling;
    }

    /**
     * Set the value of IsFederalFiling
     *
     * @return  self
     */ 
    public function setIsFederalFiling($IsFederalFiling)
    {
        $this->IsFederalFiling = $IsFederalFiling;

        return $this;
    }
    public function toArray() {
        return (array)$this;
    }
}