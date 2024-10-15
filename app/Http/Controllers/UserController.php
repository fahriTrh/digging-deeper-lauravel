<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $users = DB::table('users')
        // ->where('name', 'Garry Cassin')
        // ->first()
        // ->value('email')
        // ->where('id', 102)->first()
        // ->where('id', 102)->firstOrFail()
        // ->where('name', 'like', '%Nathaniel%')
        // ->pluck('name')
        // ->pluck('email', 'name')
        // ->select('name', 'email as user_email', 'created_at as join_at')

        // ->distinct()
        // ->pluck('name')
        // ->get()
        
        // ;


        // dd($all_user);

        // Hello World

        /**
         * try join()
         */

        $users = DB::table('posts')
                    ->join('users', 'users.id', '=', 'posts.user_id')
                    // ->select('posts.*', 'users.name')
                    ->get();

        dd($users);
    }

    public function cache()
    {
        // $users = Cache::get('users', function() {
        //     return DB::table('users')->get();
        // });

        $second = 10;
        $users = Cache::remember('users',$second, function() {
            return DB::table('users')->get();
        });

        // dd($users);
        // dd(Cache::has('users'));
        // dd(DB::table('users')->get());

        return view('cache', compact('users'));
    }
}
