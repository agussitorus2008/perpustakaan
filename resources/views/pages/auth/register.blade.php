<x-auth>
    <div class="login-main">
        <form class="theme-form" action="{{ route('register') }}" method="POST">
            @csrf
            <h4>Create your account</h4>
            <p>Enter your personal details to create account</p>
            <div class="form-group">
                <label class="col-form-label pt-0">Your Name</label>
                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                    placeholder="Your name">
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

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
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                        placeholder="*********">
                    <div class="show-hide"><span class="show"></span></div>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-0">
                <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
            </div>
            <p class="mt-4 mb-0">Already have an account?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
        </form>
    </div>
</x-auth>
