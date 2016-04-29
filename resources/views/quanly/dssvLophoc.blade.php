<!DOCTYPE html>
<html>
<head>
    <title>Quan ly - Lop hoc</title>
</head>
<body>
<button><a href="{{ url('/quanly/viewlop') }}">Back</a></button>
<br>
<h1><center>Danh sach sinh vien da dang ky</center></h1>
        <div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                                    
                    <th>Ma sinh vien</th>
                    <th>Ten sinh vien</th>
                    <th>Thoi diem dang ky</th>

                </tr>
            @for ($i = 0; $i < count($sinhviens); $i++)    
            <tr>
            
                <td>{{ $sinhviens[$i]->sv_masv }}</td>
                <td>{{ $sinhviens[$i]->sv_ten }}</td>
                <td>{{ $sinhviens[$i]->created_at }}</td>
            </tr> 
            @endfor
            </table>          
        
        </div>
        <h2>Tong so sinh vien da dang ky la {{ count($sinhviens) }}</h2>
</body>

<style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>