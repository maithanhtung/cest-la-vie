<button><a href="{{url('/quanly/viewsv')}}">Quan ly sinh vien</a></button>

<div class="container">
            {!! Form::open(array('route' => 'postSinhvien')) !!}
             <table style="width:100%; text-align:left;">
                <tr>
                  <th></th>
                  <th></th>
                </tr>
           <tr>    
             <td>Ma sinh vien: </td>  
             <td> {!! Form::input('string', 'sv_masv') !!}</td>
          </tr>

            <tr>    
             <td>Ten sinh vien: </td>  
             <td>{!! Form::input('string', 'sv_ten') !!}</td>
           </tr>

           <tr>    
             <td>Mat khau:</td>  
             <td> {!! Form::input('string', 'password') !!}</td>
          </tr>

            
       </table>
       <br>
            {!! Form::submit('Add') !!}

            {!! Form::close() !!}

        </div>
        @if ($errors->has('sv_masv'))<strong>{{ $errors->first('sv_masv') }}</strong> @endif
        @if ($errors->has('sv_ten'))<strong>{{ $errors->first('sv_ten') }}</strong> @endif
        @if ($errors->has('password'))<strong>{{ $errors->first('password') }}</strong> @endif
        @if(!empty(Session::get('tensinhvien')))
           
            Sinh vien <strong>{{ Session::get('tensinhvien')}}</strong> has been added sucesfully!
            
         @endif