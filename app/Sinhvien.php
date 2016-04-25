<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Sinhvien extends  Authenticatable
{
	protected $table = 'sinhvien';
     protected $fillable = [
        'sv_ten','sv_masv','password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
