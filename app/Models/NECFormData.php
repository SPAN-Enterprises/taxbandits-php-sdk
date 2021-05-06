<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class NECFormData extends Model
{
    private $B1NEC,$B4FedTaxWH,$IsFATCA,$Is2ndTINnot,$AccountNum,$States;
    

    /**
     * Get the value of States
     */ 
    public function getStates()
    {
        return $this->States;
    }

    /**
     * Set the value of States
     *
     * @return  self
     */ 
    public function setStates($States)
    {
        $this->States = $States;

        return $this;
    }

    /**
     * Get the value of AccountNum
     */ 
    public function getAccountNum()
    {
        return $this->AccountNum;
    }

    /**
     * Set the value of AccountNum
     *
     * @return  self
     */ 
    public function setAccountNum($AccountNum)
    {
        $this->AccountNum = $AccountNum;

        return $this;
    }

    /**
     * Get the value of Is2ndTINnot
     */ 
    public function getIs2ndTINnot()
    {
        return $this->Is2ndTINnot;
    }

    /**
     * Set the value of Is2ndTINnot
     *
     * @return  self
     */ 
    public function setIs2ndTINnot($Is2ndTINnot)
    {
        $this->Is2ndTINnot = $Is2ndTINnot;

        return $this;
    }

    /**
     * Get the value of IsFATCA
     */ 
    public function getIsFATCA()
    {
        return $this->IsFATCA;
    }

    /**
     * Set the value of IsFATCA
     *
     * @return  self
     */ 
    public function setIsFATCA($IsFATCA)
    {
        $this->IsFATCA = $IsFATCA;

        return $this;
    }

    /**
     * Get the value of B4FedTaxWH
     */ 
    public function getB4FedTaxWH()
    {
        return $this->B4FedTaxWH;
    }

    /**
     * Set the value of B4FedTaxWH
     *
     * @return  self
     */ 
    public function setB4FedTaxWH($B4FedTaxWH)
    {
        $this->B4FedTaxWH = $B4FedTaxWH;

        return $this;
    }

    /**
     * Get the value of B1NEC
     */ 
    public function getB1NEC()
    {
        return $this->B1NEC;
    }

    /**
     * Set the value of B1NEC
     *
     * @return  self
     */ 
    public function setB1NEC($B1NEC)
    {
        $this->B1NEC = $B1NEC;

        return $this;
    }

    public function toArray() {
        return (array)$this;
    }
}