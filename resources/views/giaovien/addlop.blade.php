<button><a href="{{ url('/giaovien/dashboard') }}">Giao vien</a></button>

<div class="container">
            {!! Form::open(array('route' => 'postLophoc')) !!}
            {!! Form::select('mon', $mons) !!}
             <table style="width:100%; text-align:left;">
                <tr>
                  <th></th>
                  <th></th>
                </tr>
           <tr>    
             <td>Ngay bat dau: </td>  
             <td> {!! Form::input('date', 'ngaybatdau') !!}</td>
          </tr>
             
            <tr>    
             <td>Ngay ket thuc: </td>  
             <td>{!! Form::input('date', 'ngaykethuc') !!}</td>
           </tr>

           <tr>    
             <td>Thoi gian bat dau: </td>  
             <td>{!! Form::input('time', 'thoigianbatdau') !!}</td>
           </tr>

           <tr>    
             <td>Thoi gian ket thuc: </td>  
             <td>{!! Form::input('time', 'thoigianketthuc') !!}</td>
           </tr>

           <tr>    
             <td>Dia diem hoc: </td>  
             <td>{!! Form::input('string', 'diadiemhoc') !!}</td>
           </tr>
              
   
       </table>
       <br>
            {!! Form::submit('Add') !!}

            {!! Form::close() !!}

        </div>
         @if ($errors->has('ngaybatdau'))<strong>{{ $errors->first('ngaybatdau') }}</strong> @endif
        @if ($errors->has('ngaykethuc'))<strong>{{ $errors->first('ngaykethuc') }}</strong> @endif
        @if ($errors->has('thoigianbatdau'))<strong>{{ $errors->first('thoigianbatdau') }}</strong> @endif
        @if ($errors->has('thoigianketthuc'))<strong>{{ $errors->first('thoigianketthuc') }}</strong> @endif
        @if ($errors->has('diadiemhoc'))<strong>{{ $errors->first('diadiemhoc') }}</strong> @endif
        @if(!empty(Session::get('idlop')))
           
          M vua tao Lop hoc co id la 
            
         @endif