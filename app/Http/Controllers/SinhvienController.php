<?php

namespace App\Http\Controllers;

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
   public function index(){
        return view('sinhvien.home');
    }

   public function viewDashboard(){
        echo "asds";
    }
}