<!DOCTYPE html>
<html>
<head>
	<title>Director - Classes</title>
    <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>
    <button class="back"><a href="{{url('/quanly/dashboard')}}">« BACK</a></button>
<br><br><br>

<h1 style="color: white;font-size: 250%;"><center>Class list</center></h1>
		<div class="tbl"><center>
            <table id="t04">
                <tr>
                    <th>Class ID</th>
                    <th style="text-align: left;">Subject</th>
                    <th style="text-align: left;">Teacher</th>
                    <th>Start at</th>
                    <th>End at</th>
                    <th>Start date</th>
                    <th>Finish</th>
                    <th>Student list</th>
                    <th>Status</th>
                   
                    
                </tr>
            @if($lops != null)
            @foreach ($lops as $lop)        
            <tr>
                <td><Center>{{ $lop->lop_id }}</Center></td>
                <td>{{ $lop->mon_tenmon }}</td>   
                <td>{{ $lop->gv_ten }}</td>
                <td><center>{{ $lop->thoigianbatdau }}</center></td>
                <td><center>{{ $lop->thoigianketthuc }}</center></td>
                <td><center>{{ $lop->ngaybatdau }}</center></td>
                <td><center>{{ $lop->ngaykethuc}}</center></td>
                <td><center><button class="btn"><a href="{{ url('/quanly/viewsvlop/'.$lop->lop_id) }}">Detail</a></button></center></td>  
                {{ Form::open(['route' => ['delqlLophoc', $lop->lop_id], 'method' => 'delete']) }}
                <td><center><button class="btndel">Delete</button></center></td>
                                    {{ Form::close() }}
            </tr> 
            
            @endforeach
            </table>          
		
        </center></div>

        @if(!empty(Session::get('xoalophoc')))
            <h3 style="color:white">Successfully deleted class: <span id="sp1">
            {{ Session::get('xoalophoc') }}</span></h3>
    
        @endif
        <h2 style="color: white; text-decoration: underline;">Total class: {{ count($lops)}} </h2>
            @endif
        
        
</body>

<style>
/*table, th, td {
    border: 1px solid black;
}*/
</style>
</html>