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

    public function viewupdatePass(){
        return view('giaovien.updatePassword');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('giaovien/updatePassword')
                        ->withErrors($validator)
                        ->withInput();
        }
        else{
        $id = Auth::guard('giaovien')->user()->id;
        $giaovien = Giaovien::findOrFail($id);
        $giaovien->fill([
            'password' => bcrypt($request->password)
        ])->save();

        return redirect()->back()->with('changePass', 'You have changed password successfully!');
        }
    }

    public function viewaddlop(){
    	$mons = Monhoc::lists('mon_tenmon','mon_id');
    	
    	return view('giaovien.addlop',['mons' => $mons]);
    }

    public function postLophoc(Request $request){
        $messages = [
        'ngaybatdau.required' => 'We need to know the start date!',
        'ngaybatdau.after' => 'The start date must after today!',
        'ngaykethuc.required' => 'Every class must has an end date!',
        'ngaykethuc.after' => 'End date can not before start date!',
        'thoigianbatdau.required' => 'We need to know the start time of the class!',
        'thoigianbatdau.after' => 'The class must be started after 07:00 am!',
        'thoigianbatdau.before' => 'The class must be started before 07:00 pm!',
        'thoigianketthuc.required' => 'Every class must has an end time!',
        'thoigianketthuc.after' => 'The end time must be after the start time!',
        'thoigianketthuc.before' => 'Class must be ended before 11:00 pm! ',
        'diadiemhoc.required' => 'The place field can not be empty!',
        'diadiemhoc.max' => 'Place must be under 255 characters!'
        ];

    	$validator = Validator::make($request->all(), [
            'ngaybatdau' => 'required|date|after:today',
            'ngaykethuc' => 'required|date|after:ngaybatdau',
            'thoigianbatdau' => 'required|date_format:H:i|after:07:00AM|before:07:00PM',
            'thoigianketthuc' => 'required|date_format:H:i|after:thoigianbatdau|before:11:00PM',
            'diadiemhoc' => 'required|max:255'
        ], $messages);

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

    public function viewDangky($lop_id){
        $dangkys = Dangky::where('lop_id',$lop_id)->get();
        $sinhviens = array();
        $i = 0;
        foreach ($dangkys as $dangky) {
            $sv_id = $dangky->sv_id;
            $sinhviens[$i] = Sinhvien::where('id',$sv_id)->first();
            $sinhviens[$i]->created_at = $dangky->created_at;
            $i++; 
        }
        
        return view('giaovien.dsdangky',['sinhviens' => $sinhviens]);
    }

    public function delLophoc($lop_id){
        if( Dangky::where('lop_id',$lop_id)->exists() ){
          Dangky::where('lop_id',$lop_id)->delete();
        }
        Lophoc::where('lop_id',$lop_id)->delete();
      return redirect()->back()->with('xoalophoc','Cancel class successfuly!');
    }
}