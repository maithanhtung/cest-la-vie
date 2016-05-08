<!DOCTYPE html>
<html>
    <head>
        <title>Quan ly - Giao vien</title>
        <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />

        <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css.css"> -->

    </head>
    <body>
    <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>

    <button class="back"><a href="{{url('/quanly/dashboard')}}">« BACK</a></button>
    <br><br><br> 
    <h1 style="color: white;"><center>Teacher list</center></h1>
    
        <div class="tbl"><center>
            <table id="t02">
                <tr>
                    <th>Teacher code</th>
                    <th style="text-align: left;">Full name</th> 
                    <th>Teaching class</th>
                    <th>Status</th>
                    
                </tr>
            @if($giaoviens != null)
            @foreach ($giaoviens as $giaovien)        
            <tr>
                <td><center>{{ $giaovien->gv_magv }}</center></td>
                <td>{{ $giaovien->gv_ten }}</td> 
                <td><center><button class="btn"><a href="{{ url('/quanly/viewlopGv/'.$giaovien->id) }}">Detail</a></button></center></td>
                {{ Form::open(['route' => ['delGiaovien', $giaovien->id], 'method' => 'delete']) }}
                <td><center><button class="btndel">Delete</button></center></td>
                                    {{ Form::close() }}
                
            </tr> 
            
            @endforeach
            </table>
            
        </div>
        @if(!empty(Session::get('tengiaovien')))
           
            <h3 style="color: white;">Teacher <span id="sp1">{{ Session::get('tengiaovien')}}</span> has been deleted successfully!</h3>
            
         @endif

        <button class="add"><a href="{{ url('/quanly/addgv') }}">+</a></button>
            <h2 style="color: white; text-decoration: underline;">Total teacher: {{ count($giaoviens) }} </h2>
            @endif
    </body>
    <style>
/*table, th, td {
    border: 1px solid black;
}*/
</style>
</html>