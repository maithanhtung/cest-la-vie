<!DOCTYPE html>
<html>
<head>
    <title>Quan ly - Lop hoc</title>
    <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>
    <button class="back"><a href="{{ url('/quanly/viewlopGv/'.$gv_id) }}">« BACK</a></button>
<br><br><br>

    <center><h1 style="color: white;">List of registered students class <span id="sp2">{{ $mon_tenmon }}</span> of <span id="sp2">{{ $gv_ten }}</span></h1></center>

    <div class="tbl"><center>
        <table id="t02">
                <tr>              
                    <th>Student code</th>
                    <th style="text-align: left;">Full name</th>
                    <th>Registered at</th>

                </tr>
            @foreach($dangkys as $dangky)  
            <tr>
            
                <td><center>{{ $dangky->sv_masv }}</center></td>
                <td>{{ $dangky->sv_ten }}</td>
                <td><center>{{ $dangky->created_at }}</center></td>
            </tr> 
            @endforeach
            </table>          
        
        </center></div>

        <h2 style="color: white; text-decoration: underline;">Total registered student: {{ count($dangkys) }}</h2>
</body>

<style>
/*table, th, td {
    border: 1px solid black;
}

p {
    font-size: 30px;
}*/
</style>
</html>