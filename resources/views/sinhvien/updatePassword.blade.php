
<button><a href="{{ url('/sinhvien/dashboard') }}">« BACK</a></button>
<br><br><br>
    <h2>Change Password</h2>
            {!! Form::open(array('route' => 'updateSVPassword')) !!}
             <table id="tbladd">
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
           
           <h3><span id="sp2">{{ Session::get('changePass')}}</span></h3> 
            
         @endif
    
