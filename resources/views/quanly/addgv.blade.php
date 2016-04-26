<button><a href="{{url('/quanly/viewgv')}}">Quan ly giao vien</a></button>

<div class="container">
            {!! Form::open(array('route' => 'postGiaovien')) !!}
             <table style="width:100%; text-align:left;">
                <tr>
                  <th></th>
                  <th></th>
                </tr>
           <tr>    
             <td>Ma giao vien: </td>  
             <td> {!! Form::input('string', 'gv_magv') !!}</td>
          </tr>

            <tr>    
             <td>Ten giao vien: </td>  
             <td>{!! Form::input('string', 'gv_ten') !!}</td>
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
        @if ($errors->has('gv_magv'))<strong>{{ $errors->first('gv_magv') }}</strong> @endif
        @if ($errors->has('gv_ten'))<strong>{{ $errors->first('gv_ten') }}</strong> @endif
        @if ($errors->has('password'))<strong>{{ $errors->first('password') }}</strong> @endif
        @if(!empty(Session::get('tengiaovien')))
           
            Giao vien <strong>{{ Session::get('tengiaovien')}}</strong> has been added successfully!
            
         @endif