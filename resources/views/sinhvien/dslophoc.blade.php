<!DOCTYPE html>
<html>
<head>
	<title>Sinh vien</title>
    <link href="{{ asset('assets/css/sv.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <h4 style="font-size:120%; color: white;">C'est la vie</h4>

    <button class="back"><span><a href="{{ url('/sinhvien/dashboard') }}">Back</a></span></button>

    <br><br><br><br>
    <h1 style="color:white;"><center>Class list of subject: {{ $tenmon }}</center></h1>
		<div class="tbl"><center>
            <table id="t02">
                <tr>
                    <th>No</th>
                    <th>Teacher</th>
                    <th>Start at</th>
                    <th>End at</th>
                    <th>Start date</th>
                    <th>Finish</th>
                    <th>Status</th>
                   
                    
                </tr>
               <?php $i =1; ?>
            @foreach ($lops as $lop)        
            <tr>
                <td><center>{{$i}}</center></td>
                <td>{{ $lop->gv_ten }}</td>
                <td><center>{{ $lop->thoigianbatdau }}</center></td>
                <td><center>{{ $lop->thoigianketthuc }}</center></td>
                <td><center>{{ $lop->ngaybatdau }}</center></td>
                <td><center>{{ $lop->ngaykethuc}}</center></td>
                <td><center><button class="btn"><a href="{{ url('/sinhvien/dangky/'.$lop->lop_id) }}">Register</a></button></center></td>  
            </tr> 
            <?php $i++; ?>
            @endforeach
            </table>          
		
        </center></div>
        <br>
        @if(!empty(Session::get('dangky')))
           
             <strong>{{ Session::get('dangky') }}</strong>
            
         @endif
</body>

<style>
table{
    border: 1px solid white;
}

</style>
</html>