<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lophoc extends Model
{
	protected $table = 'lophoc';
     protected $fillable = [
        'mon_id','gv_id','ngaybatdau','ngayketthuc','thoigianbatdau','thoigianketthuc','diadiemhoc'
    ];
}
