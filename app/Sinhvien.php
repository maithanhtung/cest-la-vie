<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
	protected $table = 'sinhvien';
     protected $fillable = [
        'sv_ten','sv_masv','password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
