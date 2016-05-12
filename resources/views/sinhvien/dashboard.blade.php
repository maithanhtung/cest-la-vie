<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
    <link href="{{ asset('assets/css/sv.css') }}" rel="stylesheet" type="text/css" />
   
</head>
<body>

    @if(Auth::guard('sinhvien')->check())
    <h4 style="font-size:120%; color: white;">Hello, {{ Auth::guard('sinhvien')->user()->sv_ten }}</h4>
    @endif

    <button class="logout"><span><a href="{{ url('/sinhvien/logout') }}"><strong>LOG OUT</strong></a></span></button>
    <button class="logout"><span><a href="{{ url('/sinhvien/updatePassword') }}"><strong>Change Password</strong></a></span></button>

    <h2 style="font-size: 250%; color: #00eaff;">Student Homepage</h2> 

    <div class="rcl1">   
        <button class="rcl"><a href="{{ url('/sinhvien/viewdangky') }}">Registered class list</a></button>
    </div>
<br><br>
    <h3 style="font-size: 200%; color: white;"><center>Subject List</center></h3>

<div class="tbl"><center>
    <table id="t01">
        <tr>
            <th>No</th>
            <th>Subject</th>
            <th>Class list</th>        
        </tr>
        <?php $i=1; ?>
        @foreach ($mons as $mon)        
        
        <tr>
            <td>{{$i}}</td>
            <td>{{ $mon->mon_tenmon }}</td>
            <td><center><button class="btn"><a href="{{  url('/sinhvien/viewlop/'.$mon->mon_id) }}">Detail</a></button></center></td>
        </tr>

        <?php $i++; ?>
        @endforeach
    </table>          
</center></div>
  
</body>


</html>