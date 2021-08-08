<!doctype html>
<html lang="en">
<x-head/>
<link rel="stylesheet" href="{{asset("css/welcome.css")}}">
<body>
    <section>
        <x-header-welcome/>
        @yield("main")
        <x-footer-welcome/>
    </section>
</body>
<x-script/>
</html>
