<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    private $RecipientId,$TINType,$TIN,$FirstPayeeNm,$SecondPayeeNm,$IsForeign,$Email,$Fax,$Phone;
    
   private $USAddress;

    /**
     * Get the value of RecipientId
     */ 
    public function getRecipientId()
    {
        return $this->RecipientId;
    }

    /**
     * Set the value of RecipientId
     *
     * @return  self
     */ 
    public function setRecipientId($RecipientId)
    {
        $this->RecipientId = $RecipientId;

        return $this;
    }

    /**
     * Get the value of TINType
     */ 
    public function getTINType()
    {
        return $this->TINType;
    }

    /**
     * Set the value of TINType
     *
     * @return  self
     */ 
    public function setTINType($TINType)
    {
        $this->TINType = $TINType;

        return $this;
    }

    /**
     * Get the value of TIN
     */ 
    public function getTIN()
    {
        return $this->TIN;
    }

    /**
     * Set the value of TIN
     *
     * @return  self
     */ 
    public function setTIN($TIN)
    {
        $this->TIN = $TIN;

        return $this;
    }

    /**
     * Get the value of FirstPayeeNm
     */ 
    public function getFirstPayeeNm()
    {
        return $this->FirstPayeeNm;
    }

    /**
     * Set the value of FirstPayeeNm
     *
     * @return  self
     */ 
    public function setFirstPayeeNm($FirstPayeeNm)
    {
        $this->FirstPayeeNm = $FirstPayeeNm;

        return $this;
    }

    /**
     * Get the value of SecondPayeeNm
     */ 
    public function getSecondPayeeNm()
    {
        return $this->SecondPayeeNm;
    }

    /**
     * Set the value of SecondPayeeNm
     *
     * @return  self
     */ 
    public function setSecondPayeeNm($SecondPayeeNm)
    {
        $this->SecondPayeeNm = $SecondPayeeNm;

        return $this;
    }

    /**
     * Get the value of IsForeign
     */ 
    public function getIsForeign()
    {
        return $this->IsForeign;
    }

    /**
     * Set the value of IsForeign
     *
     * @return  self
     */ 
    public function setIsForeign($IsForeign)
    {
        $this->IsForeign = $IsForeign;

        return $this;
    }

    /**
     * Get the value of Email
     */ 
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */ 
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Fax
     */ 
    public function getFax()
    {
        return $this->Fax;
    }

    /**
     * Set the value of Fax
     *
     * @return  self
     */ 
    public function setFax($Fax)
    {
        $this->Fax = $Fax;

        return $this;
    }

    /**
     * Get the value of Phone
     */ 
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * Set the value of Phone
     *
     * @return  self
     */ 
    public function setPhone($Phone)
    {
        $this->Phone = $Phone;

        return $this;
    }

   

   /**
    * Get the value of USAddress
    */ 
   public function getUSAddress()
   {
      return $this->USAddress;
   }

   /**
    * Set the value of USAddress
    *
    * @return  self
    */ 
   public function setUSAddress($USAddress)
   {
      $this->USAddress = $USAddress;

      return $this;
   }

   public function toArray() {
    return (array)$this;
}
}