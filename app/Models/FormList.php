<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class FormList extends Model
{

    
    private $RecipientId;
    public function  get_RecipientId() {
        return $this->RecipientId;
    }

    public function  set_RecipientId($RecipientId){
         $this->RecipientId = $RecipientId;
    }
    private $RecipientNm;
    public function  get_RecipientNm() {
        return $this->RecipientNm;
    }

    public function  set_RecipientNm($RecipientNm){
         $this->RecipientNm = $RecipientNm;
    }
    private $SubmissionId;
    public function  get_SubmissionId() {
        return $this->SubmissionId;
    }

    public function  set_SubmissionId($SubmissionId){
        $this->SubmissionId = $SubmissionId;
    }
    private $BusinessNm;
    public function  get_BusinessNm() {
        return $this->BusinessNm;
    }

    public function  set_BusinessNm($BusinessNm){
        $this->BusinessNm = $BusinessNm;
    }
    private $TIN;
    public function  get_TIN() {
        return $this->TIN;
    }

    public function  set_TIN($TIN){
        $this->TIN = $TIN;
    }
    private $Status;
    public function  get_Status() {
        return $this->Status;
    }

    public function  set_Status($Status){
        $this->Status = $Status;
    }

}