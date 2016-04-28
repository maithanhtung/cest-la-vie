<!DOCTYPE html>
<html>
<head>
	<title>Sinh vien</title>
</head>
<body>
<button><a href="{{ url('/sinhvien/logout') }}">LOG OUT</a></button>
<br>
@if(Auth::guard('sinhvien')->check())
Xin chao {{ Auth::guard('sinhvien')->user()->sv_ten }}
@endif
<h1><center>Danh sach mon hoc</center></h1>
		<div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                    <th>Mon hoc</th>
                    <th>Danh sach lop</th> 
                   
                    
                </tr>
            @foreach ($mons as $mon)        
            <tr>
                <td>{{ $mon->mon_tenmon }}</td>
                <td><button><a href="{{  url('/sinhvien/viewlop/'.$mon->mon_id) }}">Chi tiet</a></button></td>
            </tr> 
            
            @endforeach
            </table>          
        </div>
        <br>
        <button><a href="{{ url('/sinhvien/viewdangky') }}">Danh sach lop da dang ky</a></button>
</body>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>