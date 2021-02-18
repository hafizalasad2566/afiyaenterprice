<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        return response()->json(["status" => true, "data" => auth()->user()->task]);
    }

    public function store(Request $request)
    {
            $validator      =   Validator::make($request->all(), [
                "title"         =>      "required",
                "description"   =>      "required"            
            ]);

            if($validator->fails())
                return response()->json(["status" => false, "validation_errors" => $validator->errors()]);

            $task=new Task($request->all());
            $task->user_id=auth()->user()->id; 
            $task->save();

            return response()->json(["status" => true, "message" => "Success! task created", "data" => $task]);
    }

    public function show(Task $task)
    {
        return response()->json(["status" => true, "data" => $task]);
    }

    public function update(Request $request, Task $task)
    {
        $input          =           $request->all();
        $user           =           Auth::user();
        // validation
        $validator      =       Validator::make($request->all(), [
            "title"           =>      "required",
            "description"     =>      "required",
        ]);
        if($validator->fails()) {
            return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
        }
        // update post
        $update=$task->update($request->all());
        return response()->json(["status" => true, "message" => "Success! task updated", "data" => $task]);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(["status" => true, "message" => "Success! task deleted"], 200);
    }
}