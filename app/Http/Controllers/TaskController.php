<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(int $id){
        $folders = Auth::user()->folders()->get();
        $current_folder = Folder::findOrFail($id);
        $tasks = $current_folder->tasks()->get();
        $this->authorize('view', $current_folder);
        return view('tasks.index', [
            'folders' => $folders,
            'current_folder_id' => $current_folder->id,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm(int $id){
        return view('tasks.create', ['folder_id' => $id]);
    }

    public function create(int $id, CreateTask $request){
        $curent_folder_id = Folder::findOrFail($id);
        $task = new Task();
        $data = [
            'folder_id' => $curent_folder_id->id,
            'title' => $request->title,
            'due_date' => $request->due_date,
        ];
        $task->create($data);

        return redirect()->route('tasks.index', ['id' => $curent_folder_id->id]);
    }

    public function showEditForm(int $id, int $task_id){
        $task = Task::findOrFail($task_id);
        $this->checkRelation(Folder::find($id), $task);
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function edit(int $id, int $task_id, EditTask $request){
        $task = Task::findOrFail($task_id);
        $data = [
            'title' => $request->title,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ];
        $this->checkRelation(Folder::find($id), $task);
        $task->fill($data)->save();


        // $task->title = $request->title;
        // $task->status = $request->status;
        // $task->due_date = $request->due_date;
        // $task->save();
    

        return redirect()->route('tasks.index', ['id' => $task->folder_id]);
    }

    public function showDeleteForm(int $id, int $task_id){
        $task = Task::findOrFail($task_id);
        return view('tasks.delete', ['task' => $task]);
    }

    public function destroy(int $id, int $task_id){
        $task = Task::findOrFail($task_id);
        $curent_folder = Folder::findOrFail($id);
        $this->checkRelation(Folder::find($id), $task);
        $task->delete();
        return redirect()->route('tasks.index',['id' => $curent_folder->id]);
    }

    private function checkRelation(Folder $folder, Task $task){
        if ($folder->id !== $task->folder_id) {
            abort(404);
        }
    }
}
