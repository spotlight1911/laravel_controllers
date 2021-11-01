<?php

namespace App\Policies;

use App\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use Illuminate\Http\Request;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user,Task $task){
        return $user->id === $task->user_id;
    }
    public function edit(User $user,Task $task){
        return $user->id === $task->user_id;
    }
    public function update(Request $request, Task $task){
        return $request->id == $task->id;
    }
}
