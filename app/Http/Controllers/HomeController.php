<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function list_users()
    {
      $list_users = \DB::table('users')->select('id','name','lastname', 'type')->paginate(5);
      return view('list_users', compact('list_users'));
    }

    public function destroy($list_users)
    {
        $user = \DB::table('users')->where('id', '=', $list_users)->delete();

        $list_users = \DB::table('users')->select('id','name','lastname', 'type')->paginate(5);
        return view('list_users', compact('list_users'));
    }
}
