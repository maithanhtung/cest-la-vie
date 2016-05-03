<!DOCTYPE html>
<html>
<head>
	<title>Dang ky hoc</title>
	<link href="{{ asset('assets/css/css.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="ind">
	<div id="header">
		<h1>C'EST LA VIE</h1>
	</div>
	<h2> You are ... ? </h2>
	<div class="butwrapind">
		<div class="butind">
			<a href="{{ url('quanly/dashboard')}}" >Director</a>
		</div>
	</div>
	<div class="butwrapind">
		<div class="butind">
			<a href="{{ url('giaovien/dashboard')}}" >Teacher</a>
		</div>
	</div>
	<div class="butwrapind">
		<div class="butind">
			<a href="{{ url('sinhvien/dashboard')}}" >Student</a>
		</div>
	</div>
</body>


<footer>
	<div id="footer">
		<i><B>Star can't shine without darkness - C'est la vie</B></i>
	</div>		
</footer>

</html>