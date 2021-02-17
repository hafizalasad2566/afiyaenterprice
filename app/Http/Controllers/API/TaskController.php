<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check logged user
        $user= Auth::user();
        if(!is_null($user)) {
            $tasks= $user->task;
            if(count($tasks) > 0) {
                return response()->json(["status" => true, "count" => count($tasks), "data" => $tasks], 200);
            }

            else {
                return response()->json(["status" => false, "count" => count($tasks), "message" => "Failed! no task found"], 200);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        // check logged user
        $user               =           Auth::user();

        if(!is_null($user)) {

            // create task
            $validator      =   Validator::make($request->all(), [
                "title"         =>      "required",
                "description"   =>      "required"            
            ]);

            if($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
            }

            $taskInput              =       $request->all();
            $taskInput['user_id']   =       $user->id; 

            $task           =       Task::create($taskInput);
            if(!is_null($task)) {
                return response()->json(["status" => true, "message" => "Success! task created", "data" => $task]);
            }

            else {
                return response()->json(["status" => false, "message" => "Whoops! task not created"]);
            }
        }      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $user           = Auth::user();
        if(!is_null($user)) {
            if(!is_null($task)) {
                return response()->json(["status" => true, "data" => $task], 200);
            }
            else {
                return response()->json(["status" => false, "message" => "Failed! no task found"], 200);
            }
        }
        else {
            return response()->json(["status" => false, "message" => "Un-authorized user"], 403);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $input          =           $request->all();
        $user           =           Auth::user();

        if(!is_null($user)) {

            // validation
            $validator      =       Validator::make($request->all(), [
                "title"           =>      "required",
                "description"     =>      "required",
            ]);

            if($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
            }

            // update post
            $update       =           $task->update($request->all());

            return response()->json(["status" => true, "message" => "Success! task updated", "data" => $task], 200);

        }
        else {
            return response()->json(["status" => false, "message" => "Un-authorized user"], 403);
        }  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $user           =       Auth::user();
        
        if(!is_null($user)) {
            $task->delete();
            return response()->json(["status" => true, "message" => "Success! task deleted"], 200);
        }

        else {
            return response()->json(["status" => false, "message" => "Un-authorized user"], 403);
        }
    }
}
