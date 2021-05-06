<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ScheduleFiling extends Model
{
    private $EfileDate ;
    public function getEfileDate() {
        return $this->EfileDate  ;
    }

    public function setEfileDate($efileDate) {
        $this->EfileDate = $efileDate ;
    }

    public function toArray() {
        return (array)$this;
    }
}