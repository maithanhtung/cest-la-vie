
<!DOCTYPE html>
<html>
    <head>
        <title>Director</title>
        <link href="{{ asset('assets/css/ql.css') }}" rel="stylesheet" type="text/css" />
        <!-- <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css.css"> -->

    </head>
    <body>
    @if(Auth::guard('quanly')->check())
    <h3 style="color:white;">Welcome, {{ Auth::guard('quanly')->user()->name }}</h3>
    @endif
    
    <button class="logout"><a href="{{ url('/quanly/logout') }}">Log out</a></button>
    <button class="logout"><a href="{{ url('/quanly/updateAccount') }}">Account setting</a></button><br>
<br><br>    
    <h1 style="color:white"><center>Director Homepage</center></h1>

    <div class="tbl"><center>
        <table id="t01">
            <tr>
                    <th style="text-align: left;">Part</th>
                    <th>Total</th> 
                    <th>Status</th> 
            </tr>
                       
            <tr>
                <td>Subjects</td>
                <td><center>{{ $slmon }}</center></td> 
                <td><center><button class="btn"><a href="{{ url('/quanly/viewmon') }}">Detail</a></button></center></td>
            </tr> 

            <tr>
                <td>Classes</td>
                <td><center>{{ $sllop }}</center></td> 
                <td><center><button class="btn"><a href="{{ url('/quanly/viewlop') }}">Detail</a></button></center></td>
            </tr>
			
			 <tr>
                <td>Teachers</td>
                <td><center>{{ $slgv }}</center></td> 
                <td><center><button class="btn"><a href="{{ url('/quanly/viewgv') }}">Detail</a></button></center></td>
            </tr>

            <tr>
                <td>Students</td>
                <td><center>{{ $slsv }}</center></td> 
                <td><center><button class="btn"><a href="{{ url('/quanly/viewsv') }}">Detail</a></button></td>
            </tr>
            
           
            </table>
        </center></div>
       
    </body>
    <style>
/*table, th, td {
    border: 1px solid black;
}*/
</style>
</html>

