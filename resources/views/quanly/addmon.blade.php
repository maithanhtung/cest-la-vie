<button><a href="{{ url('/quanly/viewmon') }}">Quan ly mon</a></button>

<div class="container">
            {!! Form::open(array('route' => 'postMonhoc')) !!}
             <table style="width:100%; text-align:left;">
                <tr>
                  <th></th>
                  <th></th>
                </tr>
           <tr>    
             <td>Ma mon hoc: </td>  
             <td> {!! Form::input('string', 'mon_mamon') !!}</td>
          </tr>
             
            <tr>    
             <td>Ten mon hoc: </td>  
             <td>{!! Form::input('string', 'mon_tenmon') !!}</td>
           </tr>
              
   
       </table>
       <br>
            {!! Form::submit('Add') !!}

            {!! Form::close() !!}

        </div>
         @if ($errors->has('mon_mamon'))<strong>{{ $errors->first('mon_mamon') }}</strong> @endif
         @if ($errors->has('mon_tenmon'))<strong>{{ $errors->first('mon_tenmon') }}</strong> @endif
        @if(!empty(Session::get('tenmonhoc')))
           
            Mon <strong>{{ Session::get('tenmonhoc')}}</strong> has been added successfully!
            
         @endif