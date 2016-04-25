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
             <td> {!! Form::input('string', 'magiaovien') !!}</td>
          </tr>

            <tr>    
             <td>Ten giao vien: </td>  
             <td>{!! Form::input('string', 'tengiaovien') !!}</td>
           </tr>

           <tr>    
             <td>Mat khau:</td>  
             <td> {!! Form::input('string', 'matkhau') !!}</td>
          </tr>

            
       </table>
       <br>
            {!! Form::submit('Add') !!}

            {!! Form::close() !!}

        </div>

        @if(!empty(Session::get('tengiaovien')))
           
            Giao vien <strong>{{ Session::get('tengiaovien')}}</strong> has been added sucesfully!
            
         @endif