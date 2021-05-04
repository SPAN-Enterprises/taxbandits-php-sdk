<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ForeignAddress extends Model
{
    private $Address1;
    public function getAddress1() {
        return $this->Address1;
    }

    public function setAddress1($address1) {
        $this->Address1 = $address1;
    }

    private $Address2;
    public function getAddress2() {
        return $this->Address2;
    }

    public function setAddress2($address2) {
        $this->Address2 = $address2;
    }

    private $City;
    public function getCity() {
        return $this->City;
    }

    public function setCity($city) {
        $this->City = $city;
    }

    private $ProvinceOrStateNm;
    public function getProvinceOrStateNm() {
        return $this->ProvinceOrStateNm ;
    }

    public function setProvinceOrStateNm($provinceOrStateNm ) {
        $this->ProvinceOrStateNm  = $provinceOrStateNm ;
    }

    private $Country;
    public function getCountry() {
        return $this->Country ;
    }

    public function setCountry($country ) {
        $this->Country  = $country ;
    }

    private $PostalCd;
    public function getPostalCd() {
        return $this->PostalCd ;
    }

    public function setPostalCd($postalCd) {
        $this->PostalCd  = $postalCd ;
    }

    private $State;
    public function getState() {
        return $this->State ;
    }

    public function setState($state) {
        $this->State  = $state ;
    }

    private $ZipCd ;
    public function getZipCd() {
        return $this->ZipCd  ;
    }

    public function setZipCd($postalCd) {
        $this->ZipCd   = $postalCd ;
    }
}
