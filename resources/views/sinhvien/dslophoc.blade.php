<!DOCTYPE html>
<html>
<head>
	<title>Sinh vien</title>
</head>
<body>
<button><a href="{{ url('/sinhvien/logout') }}">LOG OUT</a></button>
<br>
<h1><center>Danh sach lop hoc cua mon {{ $tenmon }}</center></h1>
		<div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                    <th>Id lop hoc</th>
                    <th>Thoi gian bat dau</th>
                    <th>Thoi gian ket thuc</th>
                    <th>Ngay bat dau</th>
                    <th>Ngay ket thuc</th>
                    <th>Giao vien giang day</th>
                    <th>Dang ky</th>
                   
                    
                </tr>
            @foreach ($lops as $lop)        
            <tr>
                <td>{{ $lop->lop_id }}</td>
                <td>{{ $lop->thoigianbatdau }}</td>
                <td>{{ $lop->thoigianketthuc }}</td>
                <td>{{ $lop->ngaybatdau }}</td>
                <td>{{ $lop->ngaykethuc}}</td>
                <td>{{ $lop->gv_ten }}</td>
                <td>chua co gi</td>  
            </tr> 
            
            @endforeach
            </table>          
		
        </div>
</body>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>