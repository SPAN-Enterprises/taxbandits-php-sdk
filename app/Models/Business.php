<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Business extends Model
{

    protected $fillable = [
        'BusinessNm',
        'TradeNm',
        'IsEIN',
        'EINorSSN',
        'Email',
        'ContactNm',
        'Phone',
        'PhoneExtn',
        'Fax',
        'BusinessType',
        'SigningAuthority',
        'KindOfEmployer',
        'PhoneExtn',
        'KindOfPayer',
        'IsBusinessTerminated',
        'IsForeign',
        'USAddress',
        'ForeignAddress',
        'BusinessId',
        'IsForeign',
        'USAddress'
    ];
}        
