<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
        @yield('title','P3 - Lorem Ipsum/Random User Generator')
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset='utf-8'>
    <link href="/css/master.css" type='text/css' rel='stylesheet'>
    <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>

    <header>

    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>

    </footer>



    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>
</html>
