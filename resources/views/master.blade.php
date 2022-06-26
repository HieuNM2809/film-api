
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="https://res.cloudinary.com/practicaldev/image/fetch/s--E8ak4Hr1--/c_limit,f_auto,fl_progressive,q_auto,w_32/https://dev-to.s3.us-east-2.amazonaws.com/favicon.ico" />
	@include('layout.header')
    @yield('css')
    <script type="text/javascript">
        var baseUrl = '{!! url('/') !!}';
    </script>
    <script type="text/javascript">
    // review file image
        function LoadImage(_this, idImage) {
            const [file] = _this.files;
            if (file) {
                $(idImage).attr('src', URL.createObjectURL(file));
                $(idImage).show();
            }
        }
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
