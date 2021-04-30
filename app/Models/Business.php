<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business 
{

    private $BusinessNm;
    public function getBusinessNm() {
        return $this->BusinessNm;
    }

    public function setBusinessNm($businessNm) {
        $this->BusinessNm = $businessNm;
    }


    private $TradeNm;
    public function getTradeNm() {
        return $this->TradeNm;
    }

    public function setTradeNm($tradeNm) {
        $this->TradeNm = $tradeNm;
    }

    private $IsEIN;
    public function getIsEIN() {
        return $this->IsEIN;
    }

    public function setIsEIN($isEIN) {
        $this->IsEIN = $isEIN;
    }
    private $EINorSSN;
    public function getEINorSSN() {
        return $this->EINorSSN;
    }

    public function setEINorSSN($einorssn) {
        $this->EINorSSN = $einorssn;
    }
    private $Email;
    public function getEmail() {
        return $this->Email;
    }

    public function setEmail($email) {
        $this->Email = $email;
    }
    private $ContactNm;
    public function getContactNm() {
        return $this->ContactNm;
    }

    public function setContactNm($contactNm) {
        $this->ContactNm = $contactNm;
    }
    private $Phone;
    public function getPhone() {
        return $this->Phone;
    }

    public function setPhone($phone) {
        $this->Phone = $phone;
    }
    private $PhoneExtn;
    public function getPhoneExtn() {
        return $this->PhoneExtn;
    }

    public function setPhoneExtn($phoneExtn) {
        $this->PhoneExtn = $phoneExtn;
    }
    private $Fax;
    public function getFax() {
        return $this->Fax;
    }

    public function setFax($fax) {
        $this->Fax = $fax;
    }
    private $BusinessType;
    public function getBusinessType() {
        return $this->BusinessType;
    }

    public function setBusinessType($type) {
        $this->BusinessType = $type;
    }
    private $SigningAuthority;
    public function getSigningAuthority() {
        return $this->SigningAuthority;
    }

    public function setSigningAuthority($signingAuthority) {
        $this->SigningAuthority = $signingAuthority;
    }
    private $KindOfEmployer;
    public function getKindOfEmployer() {
        return $this->KindOfEmployer;
    }

    public function setKindOfEmployer($kindOfEmployer) {
        $this->KindOfEmployer = $kindOfEmployer;
    }
    private $KindOfPayer;
    public function getKindOfPayer() {
        return $this->KindOfPayer;
}

    public function setKindOfPayer($kindOfPayer) {
        $this->KindOfPayer = $kindOfPayer;
    }
    private $IsBusinessTerminated;
    public function getIsBusinessTerminated() {
        return $this->IsBusinessTerminated;
}

    public function setIsBusinessTerminated($isTerminated) {
        $this->IsBusinessTerminated = $isTerminated;
    }
    private $IsForeign;
    public function getIsForeign() {
        return $this->IsForeign;
}

    public function setIsForeign($isForign) {
        $this->IsForeign = $isForign;
    }
    private $USAddress;
    public function getUSAddress() {
        return $this->USAddress;
}

    public function setUSAddress($usAddress) {
        $this->USAddress = $usAddress;
    }
    private $ForeignAddress;
    public function getForeignAddress() {
        return $this->ForeignAddress;
}

    public function setForeignAddress($foreignAddress) {
        $this->ForeignAddress = $foreignAddress;
    }
    private $BusinessId;
    public function getBusinessId() {
        return $this->BusinessId;
    }

    public function setBusinessId($BusinessId) {
        $this->BusinessId = $BusinessId;
    }
}        
