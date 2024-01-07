<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                    src="{{ asset('assets/images/logo/logo1.png') }}"
                    style="width: 70px; height: 70px; border-radius: 50%;">
                <img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo1.png') }}"
                    style="width: 70px; height: 70px; border-radius: 50%;" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><img class="img-fluid" src="{{ asset('assets/images/logo/logo1.png') }} "
                alt="" style="width: 70px; height: 70px; border-radius: 50%;"></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-8">Applications</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title">
                            <svg class="stroke-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{ asset('assets/svg/icon-sprite.svg#fill-home') }}"></use>
                            </svg><span>Menu</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{ route('user.books.index') }}">Buku</a></li>
                            <li><a href="{{ route('user.categories.index') }}">Kategori</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
