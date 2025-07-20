@php use Carbon\Carbon; @endphp
@extends("layouts.master")


@section("title")
    Users Index
@endsection

@section("content")

    {{--    {{$user->name}}--}}
    <div class="row">
        <div class="col-6 offset-3">
            <h2 class="text-center">Update Users - "{{$user->name}}"</h2>
            <form method="post" action="{{route("users.update",$user->id)}}">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" value="{{$user->name}}" type="text"
                           class="form-control @error("name") is-invalid @enderror" id="name"
                           aria-describedby="nameInput">
                    @error('name')
                    <div id="nameInput" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" value="{{$user->email}}" type="text"
                           class="form-control @error('email') is-invalid @enderror" id="email"
                           aria-describedby="emailInput">
                    @error('email')
                    <div id="emailInput" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           value="{{$user->password}}" id="password" aria-describedby="passwordInput">
                    @error('password')
                    <div id="passwordInput" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="passwordConfirm" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" value="{{$user->password}}"
                           class="form-control @error('password_confirmation') is-invalid @enderror"
                           id="passwordConfirm" aria-describedby="passwordConfirmInput">
                    @error('password_confirmation')
                    <div id="passwordConfirmInput" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">Updated</label>
                    <input name="updated_at" type="datetime-local"
                           class="form-control @error('date') is-invalid @enderror"
                           value="{{Carbon::parse($user->created_at)->format("Y-m-d H:i:s")}}" id="date"
                           aria-describedby="dateInput">
                    @error('date')
                    <div id="dateInput" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection


@section("scripts")
    <script>
        console.log("users view");
    </script>

@endsection





{{--                <div class="mb-3">--}}
{{--                    <label for="email" class="form-label">Email</label>--}}
{{--                    <input value="{{$user->email}}" type="email" class="form-control" id="email"--}}
{{--                           aria-describedby="emailInput">--}}
{{--                    <div id="emailInput" class="invalid-feedback"></div>--}}
{{--                </div>--}}

{{--                <div class="mb-3">--}}
{{--                    <label for="password" class="form-label">Password</label>--}}
{{--                    <input type="password" class="form-control" id="password" aria-describedby="passwordInput">--}}
{{--                    <div id="passwordInput" class="invalid-feedback"></div>--}}
{{--                </div>--}}

{{--                <div class="mb-3">--}}
{{--                    <label for="confirm_password" class="form-label">Confirm Password</label>--}}
{{--                    <input type="password" class="form-control" id="passwordConfirm"--}}
{{--                           aria-describedby="passwordConfirmInput">--}}
{{--                    <div id="passwordConfirmInput" class="invalid-feedback"></div>--}}
{{--                </div>--}}

{{--                <div class="mb-3">--}}
{{--                    <label for="date" class="form-label">Date</label>--}}
{{--                    <input type="date" class="form-control" id="date" aria-describedby="dateInput">--}}
{{--                    <div id="dateInput" class="invalid-feedback"></div>--}}
{{--                </div>--}}
