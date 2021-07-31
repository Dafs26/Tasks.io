<?php

namespace App\Http\Controllers;

use App\Mail\Log_created;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $task = DB::table('tasks')->where('id','=',$request->task_id)->get(['id','description','expiration'])->first();
        $logs =  DB::table('logs')->where('task_id','=',$request->task_id)->get();
        return view('logs',compact('logs', 'task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $log = Log::create([
            'comment' => $request->comment,
            'task_id' => $request->task_id
        ]);
        $data = DB::table('users')->join('tasks','users.id','=','tasks.user_id')->where('tasks.id','=',$request->task_id)->get(['users.email','users.name'])->first();
        $mail = new Log_created($data, $request->comment);
        Mail::to($data->email)->send($mail);
        $log->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
