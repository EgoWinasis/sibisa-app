<nav class="main-header navbar
navbar-expand
navbar-white navbar-light">


    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#">
                <i class="fas fa-bars"></i>
                <span class="sr-only">Toggle navigasi</span>
            </a>
        </li>



    </ul>


    <ul class="navbar-nav ml-auto">



        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>



        <li class="nav-item dropdown user-menu">


            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                @php
                    $nama = auth()->guard('wali')->user()->name;
                @endphp
                <span>
                    {{ $nama }}
                </span>
            </a>


            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">








                <li class="user-footer">
                    <a class="btn btn-default btn-flat float-right  btn-block " href="/home">
                        <i class="fa fa-fw fa-power-off text-red"></i>
                        Keluar
                    </a>


                </li>

            </ul>

        </li>


    </ul>

</nav>
