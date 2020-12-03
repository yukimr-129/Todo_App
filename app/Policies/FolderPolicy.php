<?php

namespace App\Policies;

use App\Folder;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FolderPolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can view the folder.
     *
     * @param  \App\User  $user
     * @param  \App\Folder  $folder
     * @return mixed
     */
    public function view(User $user, Folder $folder)
    {
        return $user->id == $folder->user_id;
    }


    // /**
    //  * Determine whether the user can update the folder.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\Folder  $folder
    //  * @return mixed
    //  */
    // public function update(User $user, Folder $folder)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can delete the folder.
    //  *
    //  * @param  \App\User  $user
    //  * @param  \App\Folder  $folder
    //  * @return mixed
    //  */
    // public function delete(User $user, Folder $folder)
    // {
    //     //
    // }

}
