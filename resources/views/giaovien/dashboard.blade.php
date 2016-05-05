<!DOCTYPE html>
<html>
<head>
	<title>Giao vien</title>
    <link href="{{ asset('assets/css/gv.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<button><a href="{{ url('/giaovien/logout')}}">Log out</a></button>
<br>
@if(Auth::guard('giaovien')->check())
Xin chao {{ Auth::guard('giaovien')->user()->gv_ten }}
@endif
<h1><center>Trang chu giao vien</center></h1>

<br>

		<div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                    <th>Id lop</th>
                    <th>Mon hoc</th>
                    <th>Thoi gian bat dau</th> 
                    <th>Thoi gian ket thuc</th>
                    <th>Ngay bat dau</th>
                    <th>Ngay ket thuc</th>
                    <th>Dia diem hoc</th>
                    <th>Danh sach sinh vien</th>
                    <th>Huy lop</th>
                    
                    
                </tr>
            @if($lops != null)    
            @foreach ($lops as $lop)        
            <tr>
                <td>{{ $lop->lop_id }}</td>
                <td>{{ $lop->tenmon}}</td> 
                <td>{{ $lop->thoigianbatdau }}</td>
                <td>{{ $lop->thoigianketthuc }}</td>
                <td>{{ $lop->ngaybatdau }}</td>
                <td>{{ $lop->ngaykethuc }}</td>
                <td>{{ $lop->diadiemhoc }}</td>
                <td><button><a href="{{ url('/giaovien/viewdangky/'.$lop->lop_id) }}">Chi tiet</a></button></td>
                {{ Form::open(['route' => ['delLophoc', $lop->lop_id], 'method' => 'delete']) }}
                <td> <button type="submit">Huy lop hoc</button></td>
                                    {{ Form::close() }}
            </tr> 
            
            @endforeach
            @endif
            </table>          
		<button><a href="{{ url('/giaovien/addlop') }}">ADD LOP</a></button>
        </div>

        <br>
         @if(!empty(Session::get('xoalophoc')))
           
             <strong>{{ Session::get('xoalophoc') }}</strong>
            
         @endif
</body>
   <style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>