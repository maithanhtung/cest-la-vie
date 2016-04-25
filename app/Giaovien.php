<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giaovien extends Model
{
	protected $table = 'giaovien';
    protected $fillable = [
        'gv_ten','gv_magv','password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
