<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $self_tasks = DB::table('tasks')->where('user_id','=',Auth::id())->get(['id','description','expiration']);
        $others_tasks = DB::table('tasks')->join('users','tasks.user_id','=','users.id')->where('user_id','!=',Auth::id())->get(['users.name', 'tasks.description','tasks.expiration']);
        return view('home',compact('self_tasks','others_tasks'));
    }
}
