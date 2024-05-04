<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <a href="/dashboard-wali" class="brand-link ">


        <img src="http://sibisa-app.test/storage/images/cirlce50.png" alt="Admin Logo"
            class="brand-image img-circle elevation-3" style="opacity:.8">


        <span class="brand-text font-weight-light ">
            <b>SIBISA</b>
        </span>

    </a>


    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">

                <li class="nav-item">

                    <a class="nav-link  {{ request()->path() === 'dashboard-wali' ? 'active' : '' }}" href="/dashboard-wali">

                        <i class="fas fa-home "></i>

                        <p>
                            Beranda

                        </p>

                    </a>

                </li>

                <li class="nav-header ">

                    DATA

                </li>




                <li class="nav-item">

                    <a class="nav-link {{ request()->path() === 'presensi-wali' ? 'active' : '' }}"  href="/presensi-wali">

                        <i class="fas fa-calendar-check "></i>

                        <p>
                            Presensi

                        </p>

                    </a>

                </li>

                <li class="nav-item has-treeview ">


                   
                <li class="nav-header ">

                    APP

                </li>

                <li class="nav-item">

                    <a class="nav-link  {{ request()->path() === 'tentang-wali' ? 'active' : '' }}" href="/tentang-wali">

                        <i class="fas fa-address-card "></i>

                        <p>
                            Tentang

                        </p>

                    </a>

                </li>

            </ul>
        </nav>
    </div>

</aside>