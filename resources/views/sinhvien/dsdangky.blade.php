<!DOCTYPE html>
<html>
<head>
    <title>Sinh vien</title>
</head>
<body>
<button><a href="{{ url('/sinhvien/dashboard') }}">Back</a></button>
<br>
<h1><center>Danh sach lop hoc da dang ky</center></h1>
        <div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                                    
                    <th>Ten mon hoc</th>
                    <th>Giao vien giang day</th>
                    <th>Thoi gian bat dau</th>
                    <th>Thoi gian ket thuc</th>
                    <th>Ngay bat dau</th>
                    <th>Ngay ket thuc</th>
                    <th>Dia diem hoc</th>
                    <th>Huy dang ky</th>

                </tr>
            @for ($i = 0; $i < count($lops); $i++)    
            <tr>
            
                <td>{{ $lops[$i]->mon_tenmon }}</td>
                <td>{{ $lops[$i]->gv_ten }}</td>
                <td>{{ $lops[$i]->thoigianbatdau }}</td>
                <td>{{ $lops[$i]->thoigianketthuc }}</td>
                <td>{{ $lops[$i]->ngaybatdau }}</td>
                <td>{{ $lops[$i]->ngaykethuc }}</td>
                <td>{{ $lops[$i]->diadiemhoc }}</td>
                {{ Form::open(['route' => ['delDangky', $lops[$i]->lop_id], 'method' => 'delete']) }}
                <td> <button type="submit">Huy dang ky</button></td>
                                    {{ Form::close() }}
                  
            </tr> 
            @endfor
            </table>          
        
        </div>
        <br>
        @if(!empty(Session::get('xoadangky')))
           
             <strong>{{ Session::get('xoadangky') }}</strong>
            
         @endif
</body>

<style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>