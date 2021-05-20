<!-- Navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg fixed-top py-3">
        <div class="container"><a href="#" class="navbar-brand text-uppercase font-weight-bold">Analogue Inc</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{route('home')}}" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="{{route('users.create')}}" class="nav-link text-uppercase font-weight-bold">Register</a></li>
                    <li class="nav-item"><a href="{{route('users.index')}}" class="nav-link text-uppercase font-weight-bold">View Users</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    $(function () {
        $(document).on('scroll', function () {
            if ( $(window).scrollTop() > 10 ) {
                $('.navbar').addClass('active');
            } else {
                $('.navbar').removeClass('active');
            }
        });
    });

</script>
