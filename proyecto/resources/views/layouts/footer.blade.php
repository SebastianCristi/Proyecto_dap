<footer class="footer">

</footer>


<script src="{{URL::asset('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('js/material.min.js')}}" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="{{URL::asset('js/chartist.min.js')}}"></script>
<!--  Dynamic Elements plugin -->
<script src="{{URL::asset('js/arrive.min.js')}}"></script>
<!--  PerfectScrollbar Library -->
<script src="{{URL::asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{URL::asset('js/bootstrap-notify.js')}}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{URL::asset('js/material-dashboard.js?v=1.2.0')}}"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->


<script>

	
	    function cambia(texto){
        document.getElementById('descrsoli').innerHTML= texto;
    }




	function cambia(){
    var today = new Date().toISOString().split('T')[0];

    let x = document.querySelectorAll('input[type=date]');
    for(let i=0; i < x.length; i++){
    	x[i].setAttribute('min', today);
    }
    

	}
	
	cambia();
</script>

</html>