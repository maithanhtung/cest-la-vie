<!DOCTYPE html>
<html>
<head>
	<title>Quan ly - Sinh vien</title>
</head>
<body>
<button><a href="{{ url('/quanly/viewgv') }}">Back</a></button>
<br>
<h1><center>Danh sach lop hoc cua giao vien : {{ $gv_ten }}</center></h1>
		<div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                    <th>Id lop hoc</th>
                    <th>Mon hoc</th>
                    <th>Thoi gian bat dau</th>
                    <th>Thoi gian ket thuc</th>
                    <th>Ngay bat dau</th>
                    <th>Ngay ket thuc</th>
                    <th>Danh sach sinh vien</th>
                   
                    
                </tr>
            @foreach($lops as $lop)        
            <tr>
                <td>{{ $lop->lop_id }}</td>
                <td>{{ $lop->mon_tenmon }}</td>
                <td>{{ $lop->thoigianbatdau }}</td>
                <td>{{ $lop->thoigianketthuc }}</td>
                <td>{{ $lop->ngaybatdau }}</td>
                <td>{{ $lop->ngaykethuc}}</td> 
                <td><button><a href=" {{ url('/quanly/viewsvlopGv/'.$lop->lop_id) }}">Chi tiet</a></button></td>
            </tr> 
            
            @endforeach
            </table>          
		
        </div>

        <p>Giao vien <strong>{{ $gv_ten }}</strong> co {{ count($lops)}} lop hoc </p>
        
</body>

<style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>