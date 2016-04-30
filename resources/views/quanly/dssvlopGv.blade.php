<!DOCTYPE html>
<html>
<head>
    <title>Quan ly - Lop hoc</title>
</head>
<body>
<button><a href="{{ url('/quanly/viewlopGv/'.$gv_id) }}">Back</a></button>
<br>
<center><p>Danh sach sinh vien da dang ky lop <strong>{{ $mon_tenmon }}</strong> cua giao vien <strong>{{ $gv_ten }}</strong></p></center>
        <div class="container">
            <table style="width:100%; text-align:left;">
                <tr>
                                    
                    <th>Ma sinh vien</th>
                    <th>Ten sinh vien</th>
                    <th>Thoi diem dang ky</th>

                </tr>
            @foreach($dangkys as $dangky)  
            <tr>
            
                <td>{{ $dangky->sv_masv }}</td>
                <td>{{ $dangky->sv_ten }}</td>
                <td>{{ $dangky->created_at }}</td>
            </tr> 
            @endforeach
            </table>          
        
        </div>
        <h2>Tong so sinh vien da dang ky la {{ count($dangkys) }}</h2>
</body>

<style>
table, th, td {
    border: 1px solid black;
}

p {
    font-size: 30px;
}
</style>
</html>