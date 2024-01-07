<!DOCTYPE html>
<html lang="en">

@include('components.auth.head')

<body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        @include('components.auth.script')
    </div>
</body>

</html>
