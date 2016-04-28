<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;

use Validator;
use App\Dangky;
use App\Giaovien;
use App\Lophoc;
use App\Monhoc;
use App\Sinhvien;

class QuanlyController extends Controller
{
    public function __construct(){
        $this->middleware('quanly');
   }

//---------------------------------------DASHBOARD-----------------------------------------   
	// public function index(){
 //        return view('quanly.dashboard');
 //    }

    public function viewDashboard(){
        // $dashboard = array();
        // $dashboard['slmon'] = Monhoc::count();
        // $dashboard['sllop'] = Lophoc::count();
        // $dashboard['slsv'] = Sinhvien::count();
        // $dashboard['slgv'] = Giaovien::count();
        $slmon = Monhoc::count();
        $sllop = Lophoc::count();
        $slsv = Sinhvien::count();
        $slgv = Giaovien::count();

        return view('quanly.dashboard',['slmon'=> $slmon , 'sllop' => $sllop , 'slsv'=> $slsv , 'slgv'=> $slgv]);
    }


//----------------------------------------GIAOVIEN-----------------------------------------
    public function viewGiaovien(){
		return view('quanly.giaovien', ['giaoviens' => Giaovien::all()]);
	}

    public function postGiaovien(Request $request){

        $validator = Validator::make($request->all(), [
            'gv_magv' => 'required|unique:giaovien|max:255',
            'gv_ten' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('quanly/addgv')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
    	$gv_magv = $request->input('gv_magv');
    	$gv_ten = $request->input('gv_ten');
    	$password = $request->input('password');

    	$giaovien = new Giaovien;

        $giaovien->gv_magv = $gv_magv;
        $giaovien->gv_ten = $gv_ten;
        $giaovien->password = bcrypt($password);

       $giaovien->save();

       return redirect()->back()->with('tengiaovien', $gv_ten);
        }
    }

    public function delGiaovien($gv_id){
        $giaovien = Giaovien::where('gv_id',$gv_id)->first();
        $gv_ten = $giaovien->gv_ten;
        Giaovien::where('gv_id',$gv_id)->delete();
        Lophoc::where('gv_id',$gv_id)->delete();     
        return redirect()->back()->with('tengiaovien', $gv_ten);


    }


//----------------------------------------SINHVIEN-----------------------------------------
    public function viewSinhvien(){
		return view('quanly.sinhvien', ['sinhviens' => Sinhvien::all()]);
	}

    public function postSinhvien(Request $request){

        $validator = Validator::make($request->all(), [
            'sv_masv' => 'required|unique:sinhvien|max:255',
            'sv_ten' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('quanly/addsv')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
    	$sv_masv = $request->input('sv_masv');
    	$sv_ten = $request->input('sv_ten');
    	$password = $request->input('password');

    	$sinhvien = new Sinhvien;

        $sinhvien->sv_masv = $sv_masv;
        $sinhvien->sv_ten = $sv_ten;
        $sinhvien->password = bcrypt($password);

       $sinhvien->save();

       return redirect()->back()->with('tensinhvien', $sv_ten);
        }
    }

    public function delSinhvien($sv_id){

        $sinhvien = Sinhvien::where('sv_id',$sv_id)->first();
        $sv_ten = $sinhvien->sv_ten;
        Sinhvien::where('sv_id',$sv_id)->delete();
        if (Dangky::where('sv_id','=',$sv_id)->exists()) {
            Dangky::where('sv_id',$sv_id)->delete();
        }
             
        return redirect()->back()->with('tensinhvien', $sv_ten);

    }

//---------------------------------------MONHOC-------------------------------------------------
    public function viewMonhoc(){
		return view('quanly.monhoc', ['mons' => Monhoc::all()]);
	}

    public function postMonhoc(Request $request){
      $validator = Validator::make($request->all(), [
            'mon_mamon' => 'required|unique:monhoc|max:255',
            'mon_tenmon' => 'required|unique:monhoc|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('quanly/addmon')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

        $mon_mamon = $request->input('mon_mamon');
    	$mon_tenmon = $request->input('mon_tenmon');
    	

    	$monhoc = new Monhoc;

        $monhoc->mon_mamon = $mon_mamon;
        $monhoc->mon_tenmon = $mon_tenmon;
        

       $monhoc->save();

       return redirect()->back()->with('tenmonhoc', $mon_tenmon);
    }
}

    public function delMonhoc($mon_id){

        $monhoc = Monhoc::where('mon_id',$mon_id)->first();
        $mon_tenmon = $monhoc->mon_tenmon;
        Monhoc::where('mon_id',$mon_id)->delete();
        if (Lophoc::where('mon_id','=',$mon_id)->exists()) {
            $lophocs = Lophoc::where('mon_id','=',$mon_id)->get();
            foreach ($lophocs as $lophoc) {
                if(Dangky::where('lop_id','=',$lophoc->lop_id)->exists()){
                    Dangky::where('lop_id','=',$lophoc->lop_id)->delete();
                }    
            }
            Lophoc::where('mon_id','=',$mon_id)->delete();
        }
             
        return redirect()->back()->with('tenmon', $mon_tenmon);

    }


}