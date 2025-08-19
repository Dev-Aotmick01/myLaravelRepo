@extends("layouts/custom-login-layout")

@section("content")
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
        <div class="card-body">
            <form method="post" action="{{route("custom.register")}}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input aria-describedby="inputFirstNameFeedback" name="firstname"
                                   class="form-control @error('firstname') is-invalid @enderror"
                                   id="inputFirstName" type="text" value="{{ old('firstname') }}" placeholder="First Name" />
                            <label for="inputFirstName">First Name</label>
                            @error('firstname')
                            <div id="inputFirstNameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input aria-describedby="inputLastNameFeedback" name="lastname"
                                   class="form-control @error('lastname') is-invalid @enderror"
                                   id="inputLastName" type="text" value="{{ old('lastname') }}" placeholder="Last Name" />
                            <label for="inputLastName">Last Name</label>
                            @error('lastname')
                            <div id="inputLastNameFeedback" class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
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
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
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
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
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
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-center py-3">
            <div class="small"><a href="{{route("custom.login")}}">Have an account? Go to login</a></div>
        </div>
    </div>
@endsection
