<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($user_id)
    {
        return Task::where('user_id',$user_id)->get();
    }
    public function store(TaskStoreRequest $request)
    {
        Task::create([
            'task_name' => $request->task_name,
            'task_description' => $request->task_description,
            'completed' => 0,
            'user_id' => $request->user_id
        ]);
        $response = [
            'success' => true,
            'message' => 'Task Added'
        ];
        return response()->json($response);
    }
    public function update(Request $request, $id)
    {
        $exist = Task::find($id);
        if ($exist) {
            $exist->completed = $request->completed ? 0 : 1;
            $exist->save();
            return 'Updated Successfully';
        } else {
            return 'Not Found';
        }
    }
    public function destroy($id)
    {
        $exist = Task::find($id);
        if ($exist) {
            $exist->delete();
            return 'Task Deleted Successfully';
        } else {
            return 'Not Found';
        }
    }
}
