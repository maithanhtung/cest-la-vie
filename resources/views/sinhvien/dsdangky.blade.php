<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
    <link href="{{ asset('assets/css/sv.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <h4 style="font-size:120%; color: white;">C'est la vie</h4>

    <button class="back";><span><a href="{{ url('/sinhvien/dashboard') }}">Back</a></span></button>
    <br><br><br><br>

    <h1 style="color:white;"><center>Registed class list</center></h1>

    <div class="tbl"><center>
        <table id="t03">
                <tr>
                    <th> No </th>        
                    <th>Subject name</th>
                    <th>Teacher</th>
                    <th>Start at</th>
                    <th>End at</th>
                    <th>Start date</th>
                    <th>Finish at</th>
                    <th>Place</th>
                    <th>Status</th>

                </tr>
            @for ($i = 0; $i < count($lops); $i++)
              
            <tbody>
            <tr>
                <td><center>{{$i + 1}}</center></td>
                <td>{{ $lops[$i]->mon_tenmon }}</td>
                <td>{{ $lops[$i]->gv_ten }}</td>
                <td><center>{{ $lops[$i]->thoigianbatdau }}</center></td>
                <td><center>{{ $lops[$i]->thoigianketthuc }}</center></td>
                <td><center>{{ $lops[$i]->ngaybatdau }}</center></td>
                <td><center>{{ $lops[$i]->ngaykethuc }}</center></td>
                <td>{{ $lops[$i]->diadiemhoc }}</td>
                {{ Form::open(['route' => ['delDangky', $lops[$i]->lop_id], 'method' => 'delete']) }}
                <td><center><button class="btn" type="submit">Cancel</button></center></td>
                                    {{ Form::close() }}
                  
            </tr> 
            
            </tbody>
            @endfor
            </table>          
        
        

        <br>
        @if(!empty(Session::get('xoadangky')))
           
             <strong>{{ Session::get('xoadangky') }}</strong>
            
         @endif
</center></div>

</body>

<style>
th, td {
    border: 1px solid white;
}

</style>
</html>