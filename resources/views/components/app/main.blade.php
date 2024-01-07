<!DOCTYPE html>
<html lang="en">

@include('components.app.head')

<body onload="startTime()">
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"> <span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">
                </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('components.app.header')

        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('components.app.sidebar')
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                {{ $slot }}
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->

            @include('components.app.footer')

        </div>
    </div>
    @include('components.app.script')
</body>

</html>
