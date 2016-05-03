<!DOCTYPE html>
<html>
<head>
	<title>Sinh vien</title>
</head>
<body>
<button><a href="{{ url('/sinhvien/dashboard') }}">Back</a></button>
<br>
<h1><center>Danh sach lop hoc cua mon {{ $tenmon }}</center></h1>
		<div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                    <th>So thu tu</th>
                    <th>Giao vien giang day</th>
                    <th>Thoi gian bat dau</th>
                    <th>Thoi gian ket thuc</th>
                    <th>Ngay bat dau</th>
                    <th>Ngay ket thuc</th>
                    <th>Dang ky</th>
                   
                    
                </tr>
               <?php $i =1; ?>
            @foreach ($lops as $lop)        
            <tr>
                <td>{{$i}}</td>
                <td>{{ $lop->gv_ten }}</td>
                <td>{{ $lop->thoigianbatdau }}</td>
                <td>{{ $lop->thoigianketthuc }}</td>
                <td>{{ $lop->ngaybatdau }}</td>
                <td>{{ $lop->ngaykethuc}}</td>
                <td><button><a href="{{ url('/sinhvien/dangky/'.$lop->lop_id) }}">Dang ky</a></button></td>  
            </tr> 
            <?php $i++; ?>
            @endforeach
            </table>          
		
        </div>
        <br>
        @if(!empty(Session::get('dangky')))
           
             <strong>{{ Session::get('dangky') }}</strong>
            
         @endif
</body>

<style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>