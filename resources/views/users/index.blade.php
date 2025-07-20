@php use Carbon\Carbon; @endphp
@extends("layouts.master")


@section("title")
    Users Index
@endsection

@section("content")
    <h1>Users Index</h1>
    <div class="row">
        <div class="col-sm-6">
            <form method="post" action="{{route("users.create.dummy")}}" class="form-inline">
                @csrf
                <button type="submit" class="btn btn-primary">Create Dummy</button>
            </form>
        </div>
        <div class="col-sm-6">
            <form method="post" action="{{route("users.delete.dummy")}}" class="form-inline">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-danger">Delete All</button>
            </form>
        </div>

    </div>

    <div class="row mb-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created Date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>

            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$loop->index}}</th>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{Carbon::parse($user->created_at)->diffForHumans()}}</td>
                    <td>
                        <a href="{{route("users.show",$user->id)}}" class="btn btn-info" target="_blank"
                        >Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route("users.destroy",$user->id)}}">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$users->links("partials.pagination")}}
    {{--    {{$users->links("pagination::bootstrap-5")}}--}}
    {{--    <div class="col-sm-6">--}}
    {{--        <form method="post" action="{{route("users.delete.dummy")}}" class="form-inline">--}}
    {{--            @csrf--}}
    {{--            @method("DELETE")--}}
    {{--            <button type="submit" class="btn btn-danger">Delete All</button>--}}
    {{--        </form>--}}
    {{--    </div>--}}
@endsection


@section("scripts")
    <script>
        console.log("users view");
    </script>

@endsection
