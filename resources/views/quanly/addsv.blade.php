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
             <td> {!! Form::input('string', 'masinhvien') !!}</td>
          </tr>

            <tr>    
             <td>Ten sinh vien: </td>  
             <td>{!! Form::input('string', 'tensinhvien') !!}</td>
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

        @if(!empty(Session::get('tensinhvien')))
           
            Sinh vien <strong>{{ Session::get('tensinhvien')}}</strong> has been added sucesfully!
            
         @endif