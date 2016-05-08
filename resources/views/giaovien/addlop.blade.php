<!DOCTYPE html>
<html>
<head>
  <title>Teacher</title>
  <link href="{{ asset('assets/css/gv.css') }}" rel="stylesheet" type="text/css" />
  
</head>

<body>
  <h4 style="font-size:120%; color: black;">C'est la vie</h4>

  <a id="hmpg" href="{{ url('/giaovien/dashboard') }}">Homepage</a>
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

        
            {!! Form::submit('Add') !!}

            {!! Form::close() !!}
        

       </div> </center>
         @if ($errors->has('ngaybatdau'))<h3><strong>{{ $errors->first('ngaybatdau')}}</strong></h3> @endif
        @if ($errors->has('ngaykethuc'))<h3><strong>{{ $errors->first('ngaykethuc')}}</strong></h3> @endif
        @if ($errors->has('thoigianbatdau'))<h3><strong>{{ $errors->first('thoigianbatdau')}}</strong></h3> @endif
        @if ($errors->has('thoigianketthuc'))<h3><strong>{{ $errors->first('thoigianketthuc')}}</strong></h3> @endif
        @if ($errors->has('diadiemhoc'))<h3><strong>{{ $errors->first('diadiemhoc')}}</strong></h3> @endif
        @if(!empty(Session::get('idlop')))
           
        <h3>Class has been added successfully!</h3>            
         @endif

</body>
</html>