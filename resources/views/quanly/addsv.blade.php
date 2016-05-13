<!DOCTYPE html>
<html>
<head>
  <title>Director</title>
  <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>

  <button class="back"><a href="{{ url('/quanly/viewsv') }}">« BACK</a></button>
<br><br><br>

  <div class="tbl"><center>
    <h2 style="color:white">Add a new student</h2>
            {!! Form::open(array('route' => 'postSinhvien')) !!}
             <table id="tbladd">
           <tr>    
             <td>Student code: </td>  
             <td> {!! Form::input('string', 'sv_masv') !!}</td>
          </tr>

            <tr>    
             <td>Full name: </td>  
             <td>{!! Form::input('string', 'sv_ten') !!}</td>
           </tr>

           <tr>    
             <td>Password:</td>  
             <td> {!! Form::input('password', 'password') !!}</td>
          </tr>

            
       </table>
       <br>
            {!! Form::submit('Add') !!}

            {!! Form::close() !!}

        </center></div>
        @if ($errors->has('sv_masv'))<strong><h3 style="color: white;">{{ $errors->first('sv_masv') }}</h3></strong> @endif
        @if ($errors->has('sv_ten'))<strong><h3 style="color: white;">{{ $errors->first('sv_ten') }}</h3></strong> @endif
        @if ($errors->has('password'))<strong><h3 style="color: white;">{{ $errors->first('password') }}</h3></strong> @endif
        @if(!empty(Session::get('tensinhvien')))
           
           <h3 style="color: white"> We have a new student: <span id="sp2">{{ Session::get('tensinhvien')}}</span></h3> 
            
         @endif
    
    </body>
    </html>
