<!DOCTYPE html>
<html>
    <head>
        <title>Director - Subject</title>
        <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
        <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css.css"> -->

    </head>
    <body>
    <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>
    <button class="back"><a href="{{url('/quanly/dashboard')}}">« BACK</a></button>
<br><br><br>
    <h1 style="color:white"><center>Subject list</center></h1>
    <div class="tbl"><center>
            <table id="t02">
                <tr>
                    <th style="text-align: left;">Name</th>
                    <th style="text-align: left;">Suject code</th>
                    <th>Total class</th> 
                    <th>Status</th>
                    <!-- <th>Date</th>
                    <th>Time</th>
                    <th>Place</th>
                    <th></th>
                    <th></th>
                    <th></th> -->
                </tr>
            @if($mons != null)
            @foreach ($mons as $mon)        
            <tr>
                <td>{{ $mon->mon_tenmon }}</td>
                <td>{{ $mon->mon_mamon }}</td> 
                <td><center><button class="btn"><a href="{{ url('/quanly/viewlopMon/'.$mon->mon_id) }}">{{ $mon->sllop }} - Detail</a></button></center></td>
                {{ Form::open(['route' => ['delMonhoc', $mon->mon_id], 'method' => 'delete']) }}
                <td><center><button class="btndel" style="cursor: pointer;">Delete</button></center></td>
                                    {{ Form::close() }}
            </tr> 
            
            @endforeach
        </table></center>
    </div>
            
            @if(!empty(Session::get('tenmon')))
           
            <h3 style="color: white;">Successfully deleted subject: <span id="sp1">{{ Session::get('tenmon')}}</span></h3>           
            @endif
            <h2 style="color: white; text-decoration: underline;">Total subject: {{ count($mons) }}</h2>
            @endif
        

            <button class="add"><a href="{{ url('/quanly/addmon') }}">+</a></button>
    </body>
    <style>
/*table, th, td {
    border: 1px solid black;
}*/
</style>
</html>