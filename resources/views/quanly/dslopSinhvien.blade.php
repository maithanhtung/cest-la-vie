<!DOCTYPE html>
<html>
<head>
	<title>Director - Student</title>
    <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>

    <button class="back"><a href="{{ url('/quanly/viewsv') }}">« BACK</a></button>
    <br><br><br><br>

    <h1 style="color: white; font-size: 250%;"><center>Registered class list of : {{ $sv_ten }}</center></h1>
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
                    <th>Registered at</th>
                   
                    
                </tr>
            @for ($i = 0; $i < count($lops); $i++)        
            <tr>
                <td><center>{{ $lops[$i]->lop_id }}</center></td>
                <td>{{ $lops[$i]->mon_tenmon }}</td>
                <td>{{ $lops[$i]->gv_ten }}</td>
                <td><center>{{ $lops[$i]->thoigianbatdau }}</center></td>
                <td><center>{{ $lops[$i]->thoigianketthuc }}</center></td>
                <td><center>{{ $lops[$i]->ngaybatdau }}</center></td>
                <td><center>{{ $lops[$i]->ngaykethuc}}</center></td>
                <td><center>{{ $lops[$i]->thoigiandangky }}</center></td>  
            </tr> 
            
            @endfor
            </table>          
		
        </center></div>

        <h2 style="color: white; text-decoration: underline;">Total registered class of <span id="sp1">{{ $sv_ten }}</span>: {{ count($lops)}} </h2>
        
</body>

<style>
/*table, th, td {
    border: 1px solid black;
}*/
</style>
</html>