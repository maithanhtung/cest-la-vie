<!DOCTYPE html>
<html>
<head>
  <title>Director</title>
    <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <h4 style="font-size:120%; color: white;"><a href="{{url('/quanly/dashboard')}}">✲ Director Homepage ✲ </a></h4>

  <button class="back"><a href="{{ url('/quanly/viewmon') }}">« BACK</a></button>
<br><br><br><br><br><br>
  <div class="tbl"><center>
            {!! Form::open(array('route' => 'postMonhoc')) !!}
      <h2 style="color: white">Add a new Subject</h2>
      <table id="tbladd">
            <tr>    
             <td>Subject code</td>  
             <td> {!! Form::input('string', 'mon_mamon') !!}</td>
          </tr>
             
            <tr>    
             <td style="text-align: center;">Name</td>  
             <td>{!! Form::input('string', 'mon_tenmon') !!}</td>
           </tr>
              
   
       </table>
       <br>
            {!! Form::submit('Add') !!}
            <!-- <center><button class="add1">Add</button></center> -->
            {!! Form::close() !!}

        </center></div>
         @if ($errors->has('mon_mamon'))<strong>{{ $errors->first('mon_mamon') }}</strong> @endif
         @if ($errors->has('mon_tenmon'))<strong>{{ $errors->first('mon_tenmon') }}</strong> @endif
        @if(!empty(Session::get('tenmonhoc')))
           
            <h2 style="color: white; text-decoration: underline;">Subject <span id="sp1">"{{ Session::get('tenmonhoc')}}" </span> has been added successfully!</h2>
            
         @endif
      </body>
    </html>