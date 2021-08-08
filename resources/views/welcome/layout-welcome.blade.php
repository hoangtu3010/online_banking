<!doctype html>
<html lang="en">
<x-head/>

<body>
    <section>
        <div class="container">
            <x-header-welcome/>
            @yield("main")
            <x-footer-welcome/>
        </div>
    </section>
</body>
<x-script/>
</html>
