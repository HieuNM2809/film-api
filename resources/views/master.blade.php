
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	@include('layout.header')
    @yield('css')
    <script type="text/javascript">
        var baseUrl = '{!! url('/') !!}';
    </script>
</head>
<body>

    <div id="container" class="effect mainnav-lg">

        <!--NAVBAR-->
        <!--===================================================-->
         @include('layout.navbar')
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">
            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            @yield('content')
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->
            @include('layout.navigation')
        </div>
    @include('layout.footer')
    @yield('js')
</body>
</html>
