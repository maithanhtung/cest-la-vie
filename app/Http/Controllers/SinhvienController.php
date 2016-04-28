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

    public function dangky($lop_id){
      if (Dangky::where('lop_id','=',$lop_id)->where('sv_id','=',Auth::guard('sinhvien')->user()->id)->exists() ) {
        return redirect()->back()->with('dangky','Ban da dang ky lop nay');
      }
      else{
      $dangky = new Dangky;
      $dangky->lop_id = $lop_id;
      $dangky->sv_id = Auth::guard('sinhvien')->user()->id;
      $dangky->save();

      return redirect()->back()->with('dangky','Dang ky thanh cong');
      }
    }

    public function viewDangky(){
      $sv_id = Auth::guard('sinhvien')->user()->id;
      $dangkys = Dangky::where('sv_id',$sv_id)->get();
      $lops =array();
      $i = 0;
      foreach ($dangkys as $dangky) {
          $lop_id = $dangky->lop_id;
          $lops[$i] = Lophoc::where('lop_id',$lop_id)->first();
          $gv_id = $lops[$i]->gv_id;
          $giaovien = Giaovien::where('id',$gv_id)->first();
          $lops[$i]->gv_ten = $giaovien->gv_ten;
          $mon_id = $lops[$i]->mon_id;
          $mon = Monhoc::where('mon_id',$mon_id)->first();
          $lops[$i]->mon_tenmon = $mon->mon_tenmon;
          // echo $lops[$i]->lop_id;
          // echo $lops[$i];
          // $lops['lop_id'][$i] = $lop->lop_id;
          $i++;
          // echo "?";
          // echo $i;
          // echo $lops['lop_id'][$i];
      }
      // for ($i=0; $i < count($lops); $i++) { 
      //   echo $lops[$i]->lop_id;
      // }

      return view('sinhvien.dsdangky',['lops' => $lops]);

    }

    public function delDangky($lop_id){
      if( Dangky::where('lop_id','=',$lop_id)->where('sv_id','=',Auth::guard('sinhvien')->user()->id)->exists() ){
          Dangky::where('lop_id','=',$lop_id)->where('sv_id','=',Auth::guard('sinhvien')->user()->id)->delete();
      }
      return redirect()->back()->with('xoadangky','Huy dang ky thanh cong');
    }
}