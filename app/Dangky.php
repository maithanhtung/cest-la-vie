<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dangky extends Model
{
	protected $table = 'dangky';
    protected $fillable = [
        'lop_id','sv_id'
    ];
}
