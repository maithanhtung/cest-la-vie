<!DOCTYPE html>
<html>
    <head>
        <title>Quan ly - Mon hoc</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css.css">

    </head>
    <body>
    <button><a href="{{url('/quanly/dashboard')}}">Quan ly</a></button>

    <h1><center>Quan ly mon</center></h1>
        <div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                    <th>Ten mon</th>
                    <th>Ma mon</th>
                    <th>So lop</th> 
                    <th></th>
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
                <td><button><a href="{{ url('/quanly/viewlopMon/'.$mon->mon_id) }}">{{ $mon->sllop }}</a></button></td>
                {{ Form::open(['route' => ['delMonhoc', $mon->mon_id], 'method' => 'delete']) }}
                <td> <button type="submit">Xoa Mon</button></td>
                                    {{ Form::close() }}
            </tr> 
            
            @endforeach
            </table>
            <button><a href="{{ url('/quanly/addmon') }}">Them mon</a></button>
            <h2>Co tong so {{ count($mons) }} mon hoc</h2>
            @endif
        </div>
            @if(!empty(Session::get('tenmon')))
           
            Mon hoc <strong>{{ Session::get('tenmon')}}</strong> da duoc xoa thanh cong!
            
            @endif
    </body>
    <style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>