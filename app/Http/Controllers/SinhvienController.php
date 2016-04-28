<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;
use App\Dangky;
use App\Giaovien;
use App\Lophoc;
use App\Monhoc;
use App\Sinhvien;

class SinhvienController extends Controller
{
    public function __construct(){
        $this->middleware('sinhvien');
   }
   

    public function viewDashboard(){
   	  $mons = Monhoc::all();
      return view('sinhvien.dashboard',['mons' => $mons]);
    }

    public function viewLophoc($mon_id){
      $lops = Lophoc::where('mon_id',$mon_id)->get();
      foreach ($lops as $lop ) {
        $gv_id = $lop->gv_id;
        $giaovien = Giaovien::where('id',$gv_id)->first();
        $gv_ten = $giaovien->gv_ten;
        $lop->gv_ten = $gv_ten; 
      }
      $mon = Monhoc::where('mon_id',$mon_id)->first();
      $tenmon = $mon->mon_tenmon;

      return view('sinhvien.dslophoc',['lops' => $lops, 'tenmon' => $tenmon]);
    }
}