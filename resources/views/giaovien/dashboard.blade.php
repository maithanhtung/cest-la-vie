<!DOCTYPE html>
<html>
<head>
	<title>Teacher</title>
    <link href="{{ asset('assets/css/gv.css') }}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('assets/css/Buttons/ccs/buttons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/F.awesome/ccs/font-awesome.css') }}" rel="stylesheet" type="text/css" /> 
    <link href="{{ asset('assets/css/F.awesome/ccs/font-awesome.min.css') }}" rel="stylesheet" type="text/css" /> -->
</head>
<body>
    @if(Auth::guard('giaovien')->check())
    <h4 style="font-size: 120%; color: black;">Hello, {{ Auth::guard('giaovien')->user()->gv_ten }}</h4>
    @endif
    
    <button class="logout"><a href="{{ url('/giaovien/logout')}}">Log out ►</a></button>

    <h2 style="font-size: 250%; color: #800080">Teacher Homepage</h2> 

    <h3 style="font-size: 200%; color: #000;"><center>Teaching class list</center></h3>
	
    <div class="tbl"><center>
        <table id="t01";>
            <tr>
                <th>ID class</th>
                <th>Subject</th>
                <th>Start at</th> 
                <th>End at</th>
                <th>Start date</th>
                <th>Finish</th>
                <th>Place</th>
                <th>Student list</th>
                <th>Status</th>
                    
                    
        </tr>
            @if($lops != null)    
            @foreach ($lops as $lop)        
            <tr>
                <td><center>{{ $lop->lop_id }}</center></td>
                <td>{{ $lop->tenmon}}</td> 
                <td><center>{{ $lop->thoigianbatdau }}</center></td>
                <td><center>{{ $lop->thoigianketthuc }}</center></td>
                <td><center>{{ $lop->ngaybatdau }}</center></td>
                <td><center>{{ $lop->ngaykethuc }}</center></td>
                <td>{{ $lop->diadiemhoc }}</td>
                <td><center><button class="btn"><a href="{{ url('/giaovien/viewdangky/'.$lop->lop_id) }}">Detail</a></button></center></td>
                {{ Form::open(['route' => ['delLophoc', $lop->lop_id], 'method' => 'delete']) }}
                <td><center><button type="submit" class="btn">Cancel</button></center></td>
                                    {{ Form::close() }}
            </tr> 
            
            @endforeach
            @endif
            </table>     
        </center></div>

		<button class="add"><a href="{{ url('/giaovien/addlop') }}">+</a></button>
    
        <br>
         @if(!empty(Session::get('xoalophoc')))
           
             <strong><h3 style="color: black;">{{ Session::get('xoalophoc') }}</h3></strong>
            
         @endif
</body>
   <style>
/*table {
    border: 1px solid black;
}*/

</style>
</html>