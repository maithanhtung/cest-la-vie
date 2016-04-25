<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Giaovien extends Authenticatable
{
	protected $table = 'giaovien';
    protected $fillable = [
        'gv_ten','gv_magv','password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
