<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->search;

        if($request->search){
            

            $tasks = Task::where([
                ['name', 'like', '%'.$search.'%']
            ])->paginate(3);
        }
        else{
            $tasks = Task::paginate(3);
        }

                
        return view('index', ['tasks' => $tasks, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Task $task)
    {
        $task->name = $request->name;

        $task->save();
        $create['success'] = true;
        $create['message'] = "task created successfully";
        echo json_encode($create);

        return;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {

        return view('edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Task $task, Request $request)
    {
        $task -> name = $request->name;
        $task->update();

        $update['success'] = true;
        $update['message'] = 'Task updated successfully';
        echo json_encode($update);

        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        $destroy['success'] = true;
        $destroy['message'] = 'Task deleted successfully';
        echo json_encode($destroy);

        return;

    }
    public function check(Task $task){
        if($task->status == 0){
            $task->status = 1;
            $task->save();

            return redirect()->back()->with('msg', 'Task done');
        }else{
            $task->status = 0;
            $task->save();

            return redirect()->back()->with('msg', 'Task undone');
        }
        return;
    }
    public function list_task_completed(Request $request){
        $search = $request->search;

        if($request->search){
            

            $tasks = Task::where('status', 1)->where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        }
        else{
            $tasks = Task::where('status', 1)->paginate(3);
        }

        
        return view('tasks-completed', ['tasks' => $tasks, 'search' => $search]);
    }
}
