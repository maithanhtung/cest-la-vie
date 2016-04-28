
<!DOCTYPE html>
<html>
    <head>
        <title>Quan ly - Sinh vien</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css.css">

    </head>
    <body>
    @if(Auth::guard('quanly')->check())
      <h3>Welcome  {{ Auth::guard('quanly')->user()->name }}</h3>
      @endif
    

        
    <button><a href="{{ url('/quanly/logout') }}">Logout</a></button><br>

    <h1><center>Quan ly home page</center></h1>
        <div class="container">
            <table style="width:100%; text-align:left; ">
            <tr>
                    <th>Danh sach</th>
                    <th>So luong</th> 
                    <th></th>
                    
             </tr>
                   
            <tr>
                <td>Mon hoc</td>
                <td>{{ $slmon }}</td> 
                <td><button><a href="{{ url('/quanly/viewmon') }}">Chi tiet</a></button></td>
            </tr> 

            <tr>
                <td>Lop hoc</td>
                <td>{{ $sllop }}</td> 
                <td>tam thoi chua co</td>
            </tr>
			
			 <tr>
                <td>Giao vien</td>
                <td>{{ $slgv }}</td> 
                <td><button><a href="{{ url('/quanly/viewgv') }}">Chi tiet</a></button></td>
            </tr>

            <tr>
                <td>Sinh vien</td>
                <td>{{ $slsv }}</td> 
                <td><button><a href="{{ url('/quanly/viewsv') }}">Chi tiet</a></button></td>
            </tr>
            
           
            </table>
        </div>
       
    </body>
    <style>
table, th, td {
    border: 1px solid black;
}
</style>
</html>

