<!DOCTYPE html>
<html>
<head>
	<title>Quan ly - Sinh vien</title>
</head>
<body>
<button><a href="{{ url('/quanly/viewmon') }}">Back</a></button>
<br>
<h1><center>Danh sach lop hoc cua mon : {{ $mon_tenmon }}</center></h1>
		<div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                    <th>Id lop hoc</th>
                    <th>Giao vien giang day</th>
                    <th>Thoi gian bat dau</th>
                    <th>Thoi gian ket thuc</th>
                    <th>Ngay bat dau</th>
                    <th>Ngay ket thuc</th>
                   
                    
                </tr>
            @for ($i = 0; $i < count($lops); $i++)        
            <tr>
                <td>{{ $lops[$i]->lop_id }}</td>
                <td>{{ $lops[$i]->gv_ten }}</td>
                <td>{{ $lops[$i]->thoigianbatdau }}</td>
                <td>{{ $lops[$i]->thoigianketthuc }}</td>
                <td>{{ $lops[$i]->ngaybatdau }}</td>
                <td>{{ $lops[$i]->ngaykethuc}}</td> 
            </tr> 
            
            @endfor
            </table>          
		
        </div>

        <p>Mon <strong>{{ $mon_tenmon }}</strong> co {{ count($lops)}} lop hoc </p>
        
</body>

<style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>