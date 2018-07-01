<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <!--  Show this only on mobile to medium screens  -->
    <a class="navbar-brand d-lg-none" href="#"></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--  Use flexbox utility classes to change how the child elements are justified  -->
    <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{Url('/')}}">Home Page<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <!--   Show this only lg screens and up   -->
        <a class="navbar-brand d-none d-lg-block" href="#"></a>
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link" href="{{Url('/insert')}}">Manage Page</a>
            </li>
            <li class="nav-item">
                <a href="{{Url('/logout')}}" class="nav-link">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<br>