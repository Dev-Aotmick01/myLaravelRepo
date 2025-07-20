<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UsersUpdateRequest;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $users = DB::table("users")->select('name')->orderByDesc("name")->first();
//        $users = DB::table("users")->select('name')->orderBy("name", "asc")->get();
//        $users = DB::table("users")->orderBy("email", "desc")->get();
//        $users = DB::table("users")->whereIn("id", [3, 5, 6])->get();
//        $users = DB::table("users")->groupBy("id")->having("id", ">", 6)->get();
//        $users = DB::table("users")->where("id", ">", 6)->get();
//        $users = DB::table("users")->select('name')->orderByDesc("name")->get();
//        $users = DB::table("users")->distinct()->get();
//        $query = DB::'table("users")->select("email");
//        $users = $query->addSelect("id")->get();
//        $users = DB::select("select * from users order by id asc limit 10 offset 10");
//        $users = DB::select("select * from users where id>10 order by id asc limit 10 ");
//        $users = DB::table("users")->simplePaginate(10);
//        $users = DB::table("users")->orderBy("id")->cursorPaginate(10);
//        dd($users);
//        dd($users->total());
//        $users = DB::table("users")->get();
//        $users = DB::table("users")->paginate(10)
//            ->withPath("/admin/users/index")->appends(["name" => "Ariyan"])->withQueryString();

        $users = DB::table("users")->paginate(10);
        return view('users/index', compact('users'));


//        DB::table('users')->insert([
//            'name' => 'Aotmick Khan',
//            'email' => "aotmick@gmail.com",
//            'password' => Hash::make('mypd1234'),
//        ]);

//        $user = DB::table('users')->get();
//        dd($user);
//        DB::table('users')->where('id', 1)->update([]);


//        $update = DB::table('users')->where('id', 1)
//            ->update([
////                "password" => Hash::make("newpd4321")
//                "created_at" => Carbon::now(),
//                "updated_at" => Carbon::now()->toDateTimeString()
//            ]);
//        dd($update);


//        DB::table('users')->insert([
//            'name' => 'Ariyan',
//            'email' => "ari@ymail.com",
//            'password' => Hash::make('arpd1234'),
//        ]);
//        DB::table('users')->where('id', 19)->delete();


//        DB::table("users")->truncate();


//        $users = DB::table('users')->get();
//        return view('users.index', ['users' => $users]);


//        $users = Storage::json("public/users.json");
//        $users = DB::table('users')->get();
//        $time = Carbon::now();
//        foreach ($users as $user) {
//            echo "<br>";
//            echo $user->created_at;
//            echo "<br>";
//            echo $user->name . "<br>";
//            echo Carbon::parse($user->created_at)->diffForHumans();
//            DB::table('users')->insert([
//                "name" => $user['name'],
//                "email" => $user['email'],
//                "password" => Hash::make($user['email']),
//                "created_at" => $time->addHour(),
//                "updated_at" => $time->addMinutes(),
//            ]);
//        }
//        return redirect("/");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersUpdateRequest $request, string $id)
    {
//        dd($request->all());
        $inputs = $request->all();
        $allData = $request->safe()->merge($inputs)->except(["_token", "_method", "password_confirmation"]);

        DB::table('users')->where('id', $id)
            ->update($allData);

        return redirect()->route('users.index', $id);
//        return "WHAT man!";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersStoreRequest $request)
    {
        $inputs = $request->all();
        $allData = $request->safe()->merge($inputs)->merge([
            "created_at" => Carbon::now(),
//            "updated_at" => now(),
//            "password" => bcrypt($request->password)
        ])
            ->except(["_token", "_method", "password_confirmation"]);

        DB::table('users')->insert($allData);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = DB::table('users')->find($id);
        return view("users.show", compact('user'));

//        dd($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where("id", $id)->delete();
        return redirect()->back();

//        $user = DB::table('users')->find($id);
//        dd($user);
//        return redirect()->route('users.index');
        //return "Deleted Successfully!";
    }

    public function create_dummy(Request $request)
    {
        $faker = Factory::create();
        for ($index = 0; $index < 100; $index++) {
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make($faker->password(8)),
                "email_verified_at" => now(),
                "remember_token" => Str::random(10),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect()->back();
//        DB::table('users')->insert([
//            'name' => $faker->name(),
//            'email' => $faker->email(),
//            'password' => Hash::make($faker->password(8)),
//            "email_verified_at" => now(),
//            "remember_token" => Str::random(10),
//            'created_at' => Carbon::now(),
//            'updated_at' => Carbon::now(),
//
//        ]);


//        dd($request);

//        $users = Storage::json('public/users.json');
//        $time = Carbon::now();
//
//        foreach ($users as $user) {
//            DB::table('users')->insertOrIgnore([
//                'name' => $user['name'],
//                'email' => $user['email'],
//                'password' => Hash::make($user['email']),
//                'created_at' => $time->addHour(),
//                'updated_at' => $time->addRealHours(),
//            ]);
//        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users/create');
    }

//    public function create_dummy()
//    {
//        DB::table('users')->insert([
//            'name' => 'Aotmick Khan',
//            'email' => "aotmick@gmail.com",
//            'password' => Hash::make('mypd1234'),
//        ]);
//    }

    public function delete_dummy(Request $request)
    {
        DB::table("users")->truncate();
        return redirect()->back();
    }
}
