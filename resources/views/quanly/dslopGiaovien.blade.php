<!DOCTYPE html>
<html>
<head>
	<title>Quan ly - Sinh vien</title>
    <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>

    <button class="back"><a href="{{ url('/quanly/viewgv') }}">« BACK</a></button>
<br><br><br>

    <h1 style="color: white; font-size: 250%;"><center>Teaching class list of: {{ $gv_ten }}</center></h1>

    <div class="tbl"><center>
            <table id="t03">
                <tr>
                    <th>Class ID</th>
                    <th style="text-align: left;">Subject</th>
                    <th>Start at</th>
                    <th>End at</th>
                    <th>Start date</th>
                    <th>Finish</th>
                    <th>Student list</th>
                   
                    
                </tr>
            @foreach($lops as $lop)        
            <tr>
                <td><center>{{ $lop->lop_id }}</center></td>
                <td>{{ $lop->mon_tenmon }}</td>
                <td><center>{{ $lop->thoigianbatdau }}</center></td>
                <td><center>{{ $lop->thoigianketthuc }}</center></td>
                <td><center>{{ $lop->ngaybatdau }}</center></td>
                <td><center>{{ $lop->ngaykethuc}}</center></td> 
                <td><center><button class="btn"><a href=" {{ url('/quanly/viewsvlopGv/'.$lop->lop_id) }}">Detail</a></button></center></td>
            </tr> 
            
            @endforeach
            </table>          
		
        </center></div>

        <h2 style="color: white; text-decoration: underline;">Total teaching class of <span id="sp1">{{ $gv_ten }}</span>: {{ count($lops)}}  </h2>
        
</body>

<style>
/*table, th, td {
    border: 1px solid black;
}*/
</style>
</html>