<!DOCTYPE html>
<html>
<head>
	<title>Quanly - Lop hoc</title>
</head>
<body>
<button><a href="{{ url('/quanly/dashboard') }}">Back</a></button>
<br>
<h1><center>Danh sach lop hoc </center></h1>
		<div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                    <th>Id lop hoc</th>
                    <th>Mon hoc</th>
                    <th>Giao vien giang day</th>
                    <th>Thoi gian bat dau</th>
                    <th>Thoi gian ket thuc</th>
                    <th>Ngay bat dau</th>
                    <th>Ngay ket thuc</th>
                    <th>Danh sach sinh vien</th>
                    <th></th>
                   
                    
                </tr>
            @if($lops != null)
            @foreach ($lops as $lop)        
            <tr>
                <td>{{ $lop->lop_id }}</td>
                <td>{{ $lop->mon_tenmon }}</td>   
                <td>{{ $lop->gv_ten }}</td>
                <td>{{ $lop->thoigianbatdau }}</td>
                <td>{{ $lop->thoigianketthuc }}</td>
                <td>{{ $lop->ngaybatdau }}</td>
                <td>{{ $lop->ngaykethuc}}</td>
                <td><button><a href="{{ url('/quanly/viewsvlop/'.$lop->lop_id) }}">Chi tiet</a></button></td>  
                {{ Form::open(['route' => ['delqlLophoc', $lop->lop_id], 'method' => 'delete']) }}
                <td> <button type="submit">Huy Lop</button></td>
                                    {{ Form::close() }}
            </tr> 
            
            @endforeach
            </table>          
		
        </div>
            <h2>Co tong so {{ count($lops)}} lop hoc</h2>
            @endif
        <br>
        @if(!empty(Session::get('xoalophoc')))
           
             <strong>{{ Session::get('xoalophoc') }}</strong>
            
         @endif
</body>

<style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>