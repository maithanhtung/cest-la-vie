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
    <h2>Change Password</h2>
    </div> </center>
            {!! Form::open(array('route' => 'updateGVPassword')) !!}
             <table id="addtbl">
           <tr>    
             <td>New Password: </td>  
             <td> {!! Form::input('string', 'password') !!}</td>
          </tr>

            
       </table>
       <br>
            {!! Form::submit('Submit') !!}

            {!! Form::close() !!}

        </center></div>
        @if ($errors->has('password'))<strong><h3>{{ $errors->first('password') }}</h3></strong> @endif
        @if(!empty(Session::get('changePass')))
           
           <h3><span>{{ Session::get('changePass')}}</span></h3> 
            
         @endif
    
