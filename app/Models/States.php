<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    private $StateCd,$StateWH,$StateIdNum,$StateIncome;
    

    /**
     * Get the value of StateCd
     */ 
    public function getStateCd()
    {
        return $this->StateCd;
    }

    /**
     * Set the value of StateCd
     *
     * @return  self
     */ 
    public function setStateCd($StateCd)
    {
        $this->StateCd = $StateCd;

        return $this;
    }

    /**
     * Get the value of StateWH
     */ 
    public function getStateWH()
    {
        return $this->StateWH;
    }

    /**
     * Set the value of StateWH
     *
     * @return  self
     */ 
    public function setStateWH($StateWH)
    {
        $this->StateWH = $StateWH;

        return $this;
    }

    /**
     * Get the value of StateIdNum
     */ 
    public function getStateIdNum()
    {
        return $this->StateIdNum;
    }

    /**
     * Set the value of StateIdNum
     *
     * @return  self
     */ 
    public function setStateIdNum($StateIdNum)
    {
        $this->StateIdNum = $StateIdNum;

        return $this;
    }

    /**
     * Get the value of StateIncome
     */ 
    public function getStateIncome()
    {
        return $this->StateIncome;
    }

    /**
     * Set the value of StateIncome
     *
     * @return  self
     */ 
    public function setStateIncome($StateIncome)
    {
        $this->StateIncome = $StateIncome;

        return $this;
    }
    public function toArray() {
        return (array)$this;
    }
}
