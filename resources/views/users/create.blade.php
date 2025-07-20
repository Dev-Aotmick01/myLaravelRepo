@php use Carbon\Carbon; @endphp
@extends("layouts.master")


@section("title")
    Create Users
@endsection

@section("content")

    {{--    @if($errors->any())--}}
    {{--        @foreach($errors->all() as $error)--}}
    {{--            {{$error}}--}}
    {{--        @endforeach--}}
    {{--    @endif--}}

    <div class="row mb-5">
        <div class="col-6 offset-3">
            <h1 class="text-center">Create User</h1>
            <form method="post" action="{{route('users.store')}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" id="name" value="{{old("name")}}"
                           class="form-control @error('name') is-invalid @enderror" aria-describedby="nameInput">
                    @error('name')
                    <div id="nameInput" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" value="{{old("email")}}"
                           class="form-control @error('email') is-invalid @enderror" id="email"
                           aria-describedby="emailInput">
                    @error('email')
                    <div id="emailInput" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           id="password" aria-describedby="passwordInput">
                    @error('password')
                    <div id="passwordInput" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="passwordConfirm" class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password"
                           class="form-control @error('password_confirmation') is-invalid @enderror"
                           id="passwordConfirm"
                           aria-describedby="passwordConfirmInput">
                    @error('password_confirmation')
                    <div id="passwordConfirmInput" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                {{--                <div class="mb-3">--}}
                {{--                    <label for="date" class="form-label">Date</label>--}}
                {{--                    <input name="created_at" type="date"--}}
                {{--                           class="form-control @error('created_at') is-invalid @enderror" id="date"--}}
                {{--                           aria-describedby="dateInput">--}}
                {{--                    @error('created_at')--}}
                {{--                    <div id="dateInput" class="invalid-feedback">{{$message}}</div>--}}
                {{--                    @enderror--}}
                {{--                </div>--}}

                <button type="submit" class="btn btn-primary">Create</button>
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
{{--                    <label for="name" class="form-label">Name</label>--}}
{{--                    <input name="name" type="text" id="name"--}}
{{--                           class="form-control @error("name") is-invalid @enderror" aria-describedby="nameInput">--}}
{{--                    @error('name')--}}
{{--                    <div id="nameInput" class="invalid-feedback">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="mb-3">--}}
{{--                    <label for="email" class="form-label">Email</label>--}}
{{--                    <input name="email" value="{{$user->email}}" type="text"--}}
{{--                           class="form-control @error('email') is-invalid @enderror" id="email"--}}
{{--                           aria-describedby="emailInput">--}}
{{--                    @error('email')--}}
{{--                    <div id="emailInput" class="invalid-feedback">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="mb-3">--}}
{{--                    <label for="password" class="form-label">Password</label>--}}
{{--                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"--}}
{{--                           value="{{$user->password}}" id="password" aria-describedby="passwordInput">--}}
{{--                    @error('password')--}}
{{--                    <div id="passwordInput" class="invalid-feedback">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="mb-3">--}}
{{--                    <label for="passwordConfirm" class="form-label">Confirm Password</label>--}}
{{--                    <input name="password_confirmation" type="password" value="{{$user->password}}"--}}
{{--                           class="form-control @error('password_confirmation') is-invalid @enderror"--}}
{{--                           id="passwordConfirm" aria-describedby="passwordConfirmInput">--}}
{{--                    @error('password_confirmation')--}}
{{--                    <div id="passwordConfirmInput" class="invalid-feedback">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}

{{--                <div class="mb-3">--}}
{{--                    <label for="date" class="form-label">Updated</label>--}}
{{--                    <input name="updated_at" type="datetime-local"--}}
{{--                           class="form-control @error('date') is-invalid @enderror"--}}
{{--                           value="{{Carbon::parse($user->created_at)->format("Y-m-d H:i:s")}}" id="date"--}}
{{--                           aria-describedby="dateInput">--}}
{{--                    @error('date')--}}
{{--                    <div id="dateInput" class="invalid-feedback">{{$message}}</div>--}}
{{--                    @enderror--}}
{{--                </div>--}}
