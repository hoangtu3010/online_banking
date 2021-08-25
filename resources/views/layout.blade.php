<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-head/>
<link rel="stylesheet" href="{{asset("css/list-style.css")}}">

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{url("imgs/logo.png")}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <x-sidebar/>
    </aside>

    <div class="content-wrapper" style="padding: 0 20px">
        @yield("main")
    </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

</body>

<script>
    var counter = 1;
    setInterval(function (){
        document.getElementById('slide_radio_' + counter).checked = true;
        counter++;
        if (counter > 4){
            counter = 1;
        }
    }, 5000);
</script>

<x-script/>

</html>
