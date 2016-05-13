<!DOCTYPE html>
<html>
<head>
  <title>Director</title>
    <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>

  <button class="back"><a href="{{ url('/quanly/viewgv') }}">« BACK</a></button>
<br><br><br>

  <div class="tbl"><center>
  <h2 style="color: white;">Add a new teacher</h2>
            {!! Form::open(array('route' => 'postGiaovien')) !!}
      <table id="tbladd">
          
           <tr>    
             <td>Teacher code: </td>  
             <td> {!! Form::input('string', 'gv_magv') !!}</td>
          </tr>

            <tr>    
             <td>Full name: </td>  
             <td>{!! Form::input('string', 'gv_ten') !!}</td>
           </tr>

           <tr>    
             <td>Password: </td>  
             <td> {!! Form::input('string', 'password') !!}</td>
          </tr>

            
       </table>
       <br>
            {!! Form::submit('Add') !!}

            {!! Form::close() !!}

        </div>
        @if ($errors->has('gv_magv'))<strong><h3 style="color: white;">{{ $errors->first('gv_magv') }}</h3></strong> @endif
        @if ($errors->has('gv_ten'))<strong><h3 style="color: white;">{{ $errors->first('gv_ten') }}</h3></strong> @endif
        @if ($errors->has('password'))<strong><h3 style="color: white;">{{ $errors->first('password') }}</h3></strong> @endif
        @if(!empty(Session::get('tengiaovien')))
           
          <h3 style="color: white;"> We have a new teacher: <span id="sp2">{{ Session::get('tengiaovien')}}</span></h3>
            
         @endif