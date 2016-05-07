<!DOCTYPE html>
<html>
    <head>
        <title>Director - Student</title>
        <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />

        <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css.css"> -->

    </head>
    <body>
        <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>
        <button class="back"><a href="{{url('/quanly/dashboard')}}">« BACK</a></button>
        <br><br>
        <h1 style="color:white; font-size: 250%"><center>Student List</center></h1>
        <div class="tbl"><center>
            <table id="t02">
                <tr>
                    <th>Student code</th>
                    <th style="text-align: left;">Full name</th> 
                    <th>Registered class</th>
                    <th>Status</th>
                    
                </tr>
            @if($sinhviens != null)
            @foreach ($sinhviens as $sinhvien)        
            <tr>
                <td><center>{{ $sinhvien->sv_masv }}</center></td>
                <td>{{ $sinhvien->sv_ten }}</td> 
                <td><center><button class="btn"><a href="{{ url('/quanly/sinhviendk/'.$sinhvien->id)}}">Detail</a></button></center></td>
                {{ Form::open(['route' => ['delSinhvien', $sinhvien->id], 'method' => 'delete']) }}
                <td><center><button class="btndel">Delete</button></center></td>
                                    {{ Form::close() }}
            </tr> 
            
            @endforeach
            </table>
            </center></div>

            <button class="add"><a href="{{ url('/quanly/addsv') }}">+</a></button>

            @if(!empty(Session::get('tensinhvien')))
           
            <h3 style="color: white;">Student <span id="sp1">{{ Session::get('tensinhvien')}}</span> has been deleted successfully!
            
            @endif
            <h2 style="color: white; text-decoration: underline;">Total student:  {{ count($sinhviens) }} </h2>
            @endif
        
            
    </body>
    <style>
/*table, th, td {
    border: 1px solid black;
}*/
</style>
</html>