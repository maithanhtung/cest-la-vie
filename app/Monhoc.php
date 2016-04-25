<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
	protected $table = 'monhoc';
    protected $fillable = [
        'mon_mamon','mon_tenmon'
    ];
}
