<?php

namespace App\Observers;

use App\Folder;

class FolderObserver
{
    
    public function deleting(Folder $folder){
        $folder->tasks()->each(function ($task) {
            $task->delete();
        });
    }

    // /**
    //  * Handle the folder "deleted" event.
    //  *
    //  * @param  \App\Folder  $folder
    //  * @return void
    //  */
    // public function deleted(Folder $folder)
    // {
    //     //
    // }

}
