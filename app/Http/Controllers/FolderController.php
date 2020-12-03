<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;
use App\User;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm(){
        return view('folders.create');
    }

    public function create(CreateFolder $request){
        $folder = new Folder();
        $folders = [
            'user_id' => Auth::id(),    
            'title' => $request->title,
        ];
        $forder_cont = $folder->create($folders);

        return redirect()->route('tasks.index', ['id' => $forder_cont->id]);
    }

    public function destroy(int $folder_id){
        $folder = Folder::findOrFail($folder_id);
        $this->checkRelation($folder);
        $folder->delete();
        $first_folder = Folder::where('user_id', Auth::id())->first();
        return redirect()->route('tasks.index', ['id' => $first_folder->id]);
    }

    private function checkRelation(Folder $folder){
        if ($folder->user_id !== Auth::id()) {
            abort(404);
        }
    }
}
