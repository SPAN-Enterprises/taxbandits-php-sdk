<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SigningAuthority extends Model
{
    private $Name ;
    public function getName() {
        return $this->Name  ;
    }

    public function setName($name) {
        $this->Name = $name ;
    }

    private $Phone ;
    public function getPhone() {
        return $this->Phone  ;
    }

    public function setPhone($phone) {
        $this->Phone = $phone ;
    }

    private $BusinessMemberType ;
    public function getBusinessMemberType() {
        return $this->BusinessMemberType  ;
    }

    public function setBusinessMemberType($businessMemberType) {
        $this->BusinessMemberType = $businessMemberType ;
    }
}
