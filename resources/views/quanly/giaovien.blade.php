<!DOCTYPE html>
<html>
    <head>
        <title>Quan ly - Giaogiaon</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css.css">

    </head>
    <body>
    <button><a href="{{url('/quanly/dashboard')}}">Quan ly</a></button>
    <h1><center>Quan ly giao vien</center></h1>
        <div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                    <th>Ma giao vien</th>
                    <th>Ten giao vien</th> 
                    <th>Cac lop day</th>
                    <th></th>
                    
                </tr>
            @foreach ($giaoviens as $giaovien)        
            <tr>
                <td>{{ $giaovien->gv_magv }}</td>
                <td>{{ $giaovien->gv_ten }}</td> 
                <td> tam thoi chua co gi</td>
                {{ Form::open(['route' => ['delGiaovien', $giaovien->gv_id], 'method' => 'delete']) }}
                <td> <button type="submit">Xoa GV</button></td>
                                    {{ Form::close() }}
                
            </tr> 
            
            @endforeach
            </table>
            <button><a href="{{ url('/quanly/addgv') }}">Them giao vien</a></button>

        </div>
        @if(!empty(Session::get('tengiaovien')))
           
            Giao vien <strong>{{ Session::get('tengiaovien')}}</strong> has been deleted sucesfully!
            
         @endif
    </body>
    <style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>