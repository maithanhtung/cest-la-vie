<!DOCTYPE html>
<html>
<head>
    <title>Teacher</title>
    <link href="{{ asset('assets/css/gv.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <h4 style="font-size:120%; color: black;">C'est la vie</h4>

    <button class="back"><span><a href="{{ url('/giaovien/dashboard') }}">Back</a></span></button>
  <br><br>
    
    <div class="tbl"><center>
        <h1>List of registered students</h1>
        <table id="t02">
            <tr>           
                <th>Student code</th>
                <th>Full name</th>
                <th><center>Registered at</center></th>

            </tr>
            @for ($i = 0; $i < count($sinhviens); $i++)    
            <tr>
            
                <td>{{ $sinhviens[$i]->sv_masv }}</td>
                <td>{{ $sinhviens[$i]->sv_ten }}</td>
                <td>{{ $sinhviens[$i]->created_at }}</td>
            </tr> 
            @endfor
            </table>          
        
    </center></div>
</body>

<style>
/*table, th, td {
    border: 1px solid black;
}*/
</style>
</html>