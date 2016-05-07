<!DOCTYPE html>
<html>
<head>
    <title>Director - Classes</title>
    <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>

    <button class="back"><a href="{{ url('/quanly/viewlop') }}">« BACK</a></button>
<br><br><br>

<h1 style="color: white"><center>List of registered students</center></h1>
        <div class="tbl"><center>
            <table id="t02">
                <tr>
                                    
                    <th>Student code</th>
                    <th style="text-align: left;">Full name</th>
                    <th>Registered at</th>

                </tr>
            @for ($i = 0; $i < count($sinhviens); $i++)    
            <tr>
            
                <td><center>{{ $sinhviens[$i]->sv_masv }}</center></td>
                <td>{{ $sinhviens[$i]->sv_ten }}</td>
                <td><center>{{ $sinhviens[$i]->created_at }}</center></td>
            </tr> 
            @endfor
            </table>          
        
        </center></div>

        <h2 style="color: white; text-decoration: underline;">Total registered students:  {{ count($sinhviens) }}</h2>
</body>

<style>
/*table, th, td {
    border: 1px solid black;
}*/
</style>
</html>