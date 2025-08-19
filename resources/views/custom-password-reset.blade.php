@extends("layouts/custom-login-layout")

@section("content")

    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
        <div class="card-body">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="post" action="{{route("custom.password.update")}}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-floating mb-3">
                    <input aria-describedby="inputEmailFeedback" name="email"
                           class="form-control @error("email") is-invalid @enderror"
                           id="inputEmail" type="email" value="{{ $email ?? old('email') }}"
                           placeholder="name@example.com" />
                    <label for="inputEmail">Email address</label>
                    @error("email")
                    <div id="inputEmailFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input aria-describedby="inputPasswordFeedback" name="password"
                           class="form-control @error("password") is-invalid @enderror"
                           id="inputPassword" type="password" placeholder="Password" />
                    <label for="inputPassword">Password</label>
                    @error("password")
                    <div id="inputPasswordFeedback"  class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input aria-describedby="inputPasswordConfirmationFeedback"
                           class="form-control @error("password_confirmation") is-invalid @enderror"
                           name="password_confirmation" id="inputPasswordConfirmation" type="password" placeholder="Confirm Password" />
                    <label for="inputPasswordConfirmation">Confirm Password</label>
                    @error("password_confirmation")
                    <div id="inputPasswordConfirmationFeedback"  class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                </div>
            </form>
        </div>
    </div>

@endsection
