<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Cookie;

use Hash;
use Validator;
use App\Dangky;
use App\Giaovien;
use App\Lophoc;
use App\Monhoc;
use App\Sinhvien;
use App\Quanly;

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

    public function viewupdateAccount(){
        return view('quanly.updatePassword');
    }

    public function updateAccount(Request $request)
    {
        $id = Auth::guard('quanly')->user()->id;
        $quanly = Quanly::findOrFail($id);

        if (!Hash::check($request->oldPassword, $quanly->password)) {
            return redirect()->back()->with('check','Old password is wrong!');
        }
        else{
            $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
            'email' => 'email',
        ]);

            if ($validator->fails()) {
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            else{
                $quanly->fill(['password' => bcrypt($request->password)])->save();
                if ($request->email != null) {
                    $quanly->fill(['email' => $request->email])->save();
                }
                return redirect()->back()->with('check', 'You have changed your account information successfully!');
            }
        }
    }


//----------------------------------------GIAOVIEN-----------------------------------------
    public function viewGiaovien(){
		return view('quanly.giaovien', ['giaoviens' => Giaovien::all()]);
	}

    public function viewlopGv($id){
        $lops = Lophoc::where('gv_id',$id)->get();
        foreach ($lops as $lop) {
            $lop->mon_tenmon = Monhoc::where('mon_id',$lop->mon_id)->first()->mon_tenmon;
        }
        $gv_ten = Giaovien::where('id',$id)->first()->gv_ten;
        return view('quanly.dslopGiaovien',['lops' => $lops , 'gv_ten' => $gv_ten]);
    }

    public function viewsvlopGv($lop_id){
        $dangkys = Dangky::where('lop_id',$lop_id)->get();
        foreach ($dangkys as $dangky) {
            $sinhvien = Sinhvien::where('id',$dangky->sv_id)->first();
            $dangky->sv_ten = $sinhvien->sv_ten;
            $dangky->sv_masv = $sinhvien->sv_masv;
        }
        $lop = Lophoc::where('lop_id',$lop_id)->first();
        $mon_tenmon =  Monhoc::where('mon_id',$lop->mon_id)->first()->mon_tenmon;
        $gv_ten = Giaovien::where('id',$lop->gv_id)->first()->gv_ten;
        $gv_id = $lop->gv_id;

        return view('quanly/dssvlopGv',['dangkys' => $dangkys, 'mon_tenmon' => $mon_tenmon, 'gv_ten' => $gv_ten , 'gv_id' => $gv_id]);
    }

    public function postGiaovien(Request $request){
        $messages = [
        'gv_magv.required' => 'Teacher code field can not be empty!',
        'gv_magv.unique' => 'This teacher code has been taken already!',
        'gv_magv.max' => 'Teacher code must be under 255 characters!',
        'gv_ten.required' => 'Teacher must have a name!',
        'gv_ten.max' => 'Name of the teacher must be under 255 characters!',
        ];
        $validator = Validator::make($request->all(), [
            'gv_magv' => 'required|unique:giaovien|max:255',
            'gv_ten' => 'required|max:255',
            'password' => 'required|min:6',
        ],$messages);

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
        $giaovien = Giaovien::where('id',$gv_id)->first();
        $gv_ten = $giaovien->gv_ten;
        if (Lophoc::where('gv_id','=',$gv_id)->exists()) {
            $lops = Lophoc::where('gv_id','=',$gv_id)->get();
            foreach ($lops as $lop ) {
                $lop_id = $lop->lop_id;
                if (Dangky::where('lop_id','=',$lop_id)->exists())  {
                    Dangky::where('lop_id','=',$lop_id)->delete();
                }
            }
            
        Lophoc::where('gv_id','=',$gv_id)->delete();  
        }
        Giaovien::where('id','=',$gv_id)->delete();
        return redirect()->back()->with('tengiaovien', $gv_ten);


    }


//----------------------------------------SINHVIEN-----------------------------------------
    public function viewSinhvien(){
		return view('quanly.sinhvien', ['sinhviens' => Sinhvien::all()]);
	}

    public function postSinhvien(Request $request){
        $messages = [
        'sv_masv.required' => 'Student code field can not be empty!',
        'sv_masv.unique' => 'This student code has been taken already!',
        'sv_masv.max' => 'Student code must be under 255 characters!',
        'sv_ten.required' => 'Student must have a name!',
        'sv_ten.max' => 'Name of the student must be under 255 characters!',
        ];
        $validator = Validator::make($request->all(), [
            'sv_masv' => 'required|unique:sinhvien|max:255',
            'sv_ten' => 'required|max:255',
            'password' => 'required|min:6',
        ],$messages);

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

    public function viewSinhviendk($sv_id){
        $sv_ten = Sinhvien::where('id',$sv_id)->first()->sv_ten;
        $dangkys = Dangky::where('sv_id',$sv_id)->get();
        $lops = array();
        $i = 0;
        foreach ($dangkys as $dangky) {
            $lop_id = $dangky->lop_id;
            $lops[$i] = Lophoc::where('lop_id',$lop_id)->first();
            $giaovien = Giaovien::where('id',$lops[$i]->gv_id)->first();
            $monhoc = Monhoc::where('mon_id',$lops[$i]->mon_id)->first();
            $lops[$i]->gv_ten = $giaovien->gv_ten;
            $lops[$i]->mon_tenmon = $monhoc->mon_tenmon;
            $lops[$i]->thoigiandangky = $dangky->created_at;
            $i++;
        }
        return view('quanly.dslopSinhvien',['lops' => $lops , 'sv_ten' => $sv_ten]);
    }

    public function delSinhvien($sv_id){

        $sinhvien = Sinhvien::where('id',$sv_id)->first();
        $sv_ten = $sinhvien->sv_ten;
        Sinhvien::where('id',$sv_id)->delete();
        if (Dangky::where('sv_id','=',$sv_id)->exists()) {
            Dangky::where('sv_id','=',$sv_id)->delete();
        }
             
        return redirect()->back()->with('tensinhvien', $sv_ten);

    }

//---------------------------------------MONHOC-------------------------------------------------
    public function viewMonhoc(){
        $mons = Monhoc::all();
        foreach ($mons as $mon ) {
            $lophocs = Lophoc::where('mon_id',$mon->mon_id)->get();
            $mon->sllop = Count($lophocs);
        }

		return view('quanly.monhoc', ['mons' => $mons]);
	}

    public function viewlopMon($mon_id){
        $lops = Lophoc::where('mon_id',$mon_id)->get();
        foreach ($lops as $lop ) {
            $giaovien = Giaovien::where('id',$lop->gv_id)->first();
            $lop->gv_ten = $giaovien->gv_ten;
        }
        $mon_tenmon = Monhoc::where('mon_id',$mon_id)->first()->mon_tenmon;
        return view('quanly.dslopMonhoc',['lops' => $lops , 'mon_tenmon' => $mon_tenmon]);
    }

    public function postMonhoc(Request $request){
        $messages = [
        'mon_mamon.required' => 'The subject code field must not be empty!',
        'mon_mamon.unique' => 'This subject code has been taken already!',
        'mon_mamon.max' => 'Subject code must be under 255 characters!',
        'mon_tenmon.required' => 'The Name field must not be empty!',
        'mon_tenmon.unique' => 'This name of subject has been taken already!',
        'mon_tenmon.max' => 'Subject name must be under 255 characters!',
        ];
        $validator = Validator::make($request->all(), [
            'mon_mamon' => 'required|unique:monhoc|max:255',
            'mon_tenmon' => 'required|unique:monhoc|max:255',
        ],$messages);

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


//---------------------------------------LOPHOC-------------------------------------------------

    public function viewLophoc(){
        $lops = Lophoc::all();
        foreach ($lops as $lop) {
            $gv_id = $lop->gv_id;
            $giaovien = Giaovien::where('id',$gv_id)->first();
            $lop->gv_ten = $giaovien->gv_ten;
            $mon_id = $lop->mon_id;
            $mon = Monhoc::where('mon_id',$mon_id)->first();
            $lop->mon_tenmon = $mon->mon_tenmon;
        }
        return view('quanly.lophoc',['lops' => $lops]);
    }

    public function viewSvlop($lop_id){
        $dangkys = Dangky::where('lop_id',$lop_id)->get();
        $sinhviens = array();
        $i = 0;
        foreach ($dangkys as $dangky) {
            $sv_id = $dangky->sv_id;
            $sinhviens[$i] = Sinhvien::where('id',$sv_id)->first();
            $i++;
        }
        return view('quanly.dssvLophoc',['sinhviens' => $sinhviens]);
    }

    public function delLophoc($lop_id){
        if( Dangky::where('lop_id',$lop_id)->exists() ){
            Dangky::where('lop_id',$lop_id)->delete();
        }
        Lophoc::where('lop_id',$lop_id)->delete();
      return redirect()->back()->with('xoalophoc','Huy lop hoc thanh cong');
    }

}