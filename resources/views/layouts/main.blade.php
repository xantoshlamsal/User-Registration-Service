<!DOCTYPE html>
<html lang="en">

<head>
 @include('layouts.head')
</head>
<body>
@include('layouts.navbar')
<img class="background-image-home" id="backgroundImage" src="{{asset('images/background.gif')}}" alt="test">
<div class="page-wrapper bg-gra-03 p-t-130 p-b-50">
    @yield('content')
</div>


@include('layouts.footer')
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
