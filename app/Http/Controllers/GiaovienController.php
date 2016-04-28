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

class GiaovienController extends Controller
{
    public function __construct(){
        $this->middleware('giaovien');
   }
    public function index(){
        return view('giaovien.dashboard');
    }

    public function viewDashboard(){
    	if (Lophoc::where('gv_id',Auth::guard('giaovien')->user()->id)->exists()) {
            $lops = Lophoc::where('gv_id',Auth::guard('giaovien')->user()->id)->get();
            foreach ($lops as $lop) {
            $mon_id = $lop->mon_id;
            $mon = Monhoc::where('mon_id',$mon_id)->first();
            $tenmon = $mon->mon_tenmon;
            $lop->tenmon = $tenmon;
            }
        }
        else{
            $lops = null;
        }    
    	
    	


        return view('giaovien.dashboard',['lops' => $lops]);
    }

    public function viewaddlop(){
    	$mons = Monhoc::lists('mon_tenmon','mon_id');
    	
    	return view('giaovien.addlop',['mons' => $mons]);
    }

    public function postLophoc(Request $request){
    	$validator = Validator::make($request->all(), [
            'ngaybatdau' => 'required|date|after:today',
            'ngaykethuc' => 'required|date|after:ngaybatdau',
            'thoigianbatdau' => 'required|date_format:H:i',
            'thoigianketthuc' => 'required|date_format:H:i|after:thoigianbatdau',
            'diadiemhoc' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('giaovien/addlop')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

    	$mon = $request->input('mon');
    	$ngaybatdau = $request->input('ngaybatdau');
    	$ngaykethuc = $request->input('ngaykethuc');
    	$thoigianbatdau = $request->input('thoigianbatdau');
    	$thoigianketthuc = $request->input('thoigianketthuc');
    	$diadiemhoc = $request->input('diadiemhoc');


    	$lophoc = new Lophoc;
    	$lophoc->gv_id = Auth::guard('giaovien')->user()->id;
        $lophoc->mon_id = $mon;
        $lophoc->ngaybatdau = $ngaybatdau;
        $lophoc->ngaykethuc = $ngaykethuc;
        $lophoc->thoigianbatdau = $thoigianbatdau;
        $lophoc->thoigianketthuc = $thoigianketthuc;
        $lophoc->diadiemhoc = $diadiemhoc;
        

       $lophoc->save();

       return redirect()->back()->with('idlop',$mon);
        }

    }
}