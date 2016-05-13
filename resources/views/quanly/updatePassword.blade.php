<!DOCTYPE html>
<html>
<head>
  <title>Director</title>
  <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>


  <button class="back"><a href="{{ url('/quanly/dashboard') }}">« BACK</a></button>
<br><br><br>

  <div class="tbl"><center>
    <h2 style="color:white">Change Password</h2>
            {!! Form::open(array('route' => 'updateQLAccount')) !!}
        <table id="tbladd">
          <tr>    
            <td>Old Password: </td>  
            <td> {!! Form::input('password', 'oldPassword') !!}</td>
          </tr>

          <tr>    
            <td>New Password: </td>  
            <td> {!! Form::input('password', 'password') !!}</td>
          </tr>

          <tr>    
             <td>New Email: </td>  
             <td> {!! Form::input('email', 'email') !!}</td>
          </tr>

            
       </table>
       <br>
            {!! Form::submit('Change') !!}
      
            {!! Form::close() !!}

        </center></div>
        @if ($errors->has('password'))<strong><h3 style="color: white;">{{ $errors->first('password') }}</h3></strong> @endif
        @if ($errors->has('email'))<strong><h3 style="color: white;">{{ $errors->first('email') }}</h3></strong> @endif
        @if(!empty(Session::get('check')))
           
           <h3 style="color: white"><span id="sp2">{{ Session::get('check')}}</span></h3> 
            
         @endif
    
    </body>
    </html>
