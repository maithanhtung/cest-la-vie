<!DOCTYPE html>
<html>
    <head>
        <title>Quan ly - Sinh vien</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css.css">

    </head>
    <body>
    <button><a href="{{url('/quanly/dashboard')}}">Quan ly</a></button>
    <h1><center>Quan ly sinh vien</center></h1>
        <div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                    <th>Ma sinh vien</th>
                    <th>Ten sinh vien</th> 
                    <th>Tinh trang dang ki</th>
                    <th></th>
                    
                </tr>
            @if($sinhviens != null)
            @foreach ($sinhviens as $sinhvien)        
            <tr>
                <td>{{ $sinhvien->sv_masv }}</td>
                <td>{{ $sinhvien->sv_ten }}</td> 
                <td><button><a href="{{ url('/quanly/sinhviendk/'.$sinhvien->id)}}">xem</a></button></td>
                {{ Form::open(['route' => ['delSinhvien', $sinhvien->id], 'method' => 'delete']) }}
                <td> <button type="submit">Xoa SV</button></td>
                                    {{ Form::close() }}
            </tr> 
            
            @endforeach
            </table>
            <button><a href="{{ url('/quanly/addsv') }}">Them sinh vien</a></button>
            <h2>Co tong so {{ count($sinhviens) }} sinh vien</h2>
            @endif
        </div>
            @if(!empty(Session::get('tensinhvien')))
           
            Sinh vien <strong>{{ Session::get('tensinhvien')}}</strong> has been deleted successfully!
            
            @endif
    </body>
    <style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>