<!DOCTYPE html>
<html>
<head>
	<title>Director</title>
    <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>
<button class="back"><a href="{{ url('/quanly/viewmon') }}">« BACK</a></button>
<br><br>
<h1 style="color: white;"><center>Class list of Subject : {{ $mon_tenmon }}</center></h1>
		<div class="tbl"><center>
            <table id="t03">
                <tr>
                    <th style="text-align: left;">Class ID</th>
                    <th style="text-align: left;">Teacher</th>
                    <th>Start at</th>
                    <th>End at</th>
                    <th>Start date</th>
                    <th>Finish</th>
                   
                    
                </tr>
            @for ($i = 0; $i < count($lops); $i++)        
            <tr>
                <td>{{ $lops[$i]->lop_id }}</td>
                <td>{{ $lops[$i]->gv_ten }}</td>
                <td><center>{{ $lops[$i]->thoigianbatdau }}</center></td>
                <td><center>{{ $lops[$i]->thoigianketthuc }}</center></td>
                <td><center>{{ $lops[$i]->ngaybatdau }}</center></td>
                <td><center>{{ $lops[$i]->ngaykethuc}}</center></td> 
            </tr> 
            
            @endfor
            </table>          
		
        </center></div>

        <h2 style="color: white;text-decoration: underline; ">Total class of  <strong>{{ $mon_tenmon }}</strong> : {{ count($lops)}} </h2>
        
</body>

<style>
/*table, th, td {
    border: 1px solid black;
}*/
</style>
</html>