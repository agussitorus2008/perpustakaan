<x-auth>
    <div class="login-main">
        <form class="theme-form" action="{{ route('login') }}" method="POST">
            @csrf
            <h4>Sign in to account</h4>
            <p>Enter your email & password to login</p>
            <div class="form-group">
                <label class="col-form-label">Email Address</label>
                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                    placeholder="Test@gmail.com">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label class="col-form-label">Password</label>
                <div class="form-input position-relative">
                    <input class="form-control @error('login.password') is-invalid @enderror" type="password"
                        name="password" placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>
                </div>
                @error('login.password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-0">
                <div class="text-end mt-3">
                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                </div>
            </div>
            <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="{{ route('register') }}">Create
                    Account</a>
            </p>
        </form>
    </div>
</x-auth>
