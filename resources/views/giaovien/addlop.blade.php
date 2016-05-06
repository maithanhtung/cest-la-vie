<!DOCTYPE html>
<html>
<head>
  <title>Teacher</title>
  <link href="{{ asset('assets/css/gv.css') }}" rel="stylesheet" type="text/css" />
  
</head>

<body>
  <h4 style="font-size:120%; color: black;">C'est la vie</h4>


  <button class="hmpg"><a href="{{ url('/giaovien/dashboard') }}">Homepage</a></button>
  <center><div>
    <center><div class="bar">
      Subject:{!! Form::open(array('route' => 'postLophoc')) !!}
      {!! Form::select('mon', $mons) !!}
     </div></center>
             <table id="addtbl">
                <!-- <tr>
                  <th></th>
                  <th></th>
                </tr> -->
<br>
           <tr>    
             <td>Start date: </td>  
             <td> {!! Form::input('date', 'ngaybatdau') !!}</td>
          </tr>
             
            <tr>    
             <td>Finish: </td>  
             <td>{!! Form::input('date', 'ngaykethuc') !!}</td>
           </tr>

           <tr>    
             <td>Start at: </td>  
             <td>{!! Form::input('time', 'thoigianbatdau') !!}</td>
           </tr>

           <tr>    
             <td>End at: </td>  
             <td>{!! Form::input('time', 'thoigianketthuc') !!}</td>
           </tr>

           <tr>    
             <td>Place: </td>  
             <td>{!! Form::input('string', 'diadiemhoc') !!}</td>
           </tr>
              
   
        </table>
        <br>

        
            {!! Form::submit('Add class') !!}

            {!! Form::close() !!}
        

       </div> </center>
         @if ($errors->has('ngaybatdau'))<strong>{{ $errors->first('ngaybatdau') }}</strong> @endif
        @if ($errors->has('ngaykethuc'))<strong>{{ $errors->first('ngaykethuc') }}</strong> @endif
        @if ($errors->has('thoigianbatdau'))<strong>{{ $errors->first('thoigianbatdau') }}</strong> @endif
        @if ($errors->has('thoigianketthuc'))<strong>{{ $errors->first('thoigianketthuc') }}</strong> @endif
        @if ($errors->has('diadiemhoc'))<strong>{{ $errors->first('diadiemhoc') }}</strong> @endif
        @if(!empty(Session::get('idlop')))
           
          M vua tao Lop hoc co id la 
            
         @endif

</body>
</html>