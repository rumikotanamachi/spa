<?php
//CRUD処理
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TaskCollection;
use App\Task;

class TaskController extends Controller
{
    //登録
    public function store(Request $request)
    {
        $task = new Task([
            'title' => $request->get('title'),
            'deadline' => $request->get('deadline'),
            'comment' => $request->get('comment')
        ]);
        $task->save();
        return response()->json('success');
    }
    //表示
    public function index()
    {
        return new TaskCollection(Task::all());
    }
    //更新
    public function edit($id)
    {
        $task = Task::find($id);
        return response()->json($task);
    }

    public function update($id, Request $request)
    {
        $task = Task::find($id);
        $task->update($request->all());
        return response()->json('successfully updated');
    }
    //消去
    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json('successfully deleted');
    }
}
