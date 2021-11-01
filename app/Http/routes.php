<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

//Route::get('/tasks','TaskController@index')->name('tasks.index');
//Route::post('/tasks','TaskController@store')->name('');

// OR >>>>

Route::resource('tasks','TaskController',[
    'except'=>['create','show'],
]);

//Route::put('/tasks/{task}',function (\Illuminate\Http\Request $request, \App\Models\Task $task){
//    $this->validate($request, [
//        'name' => 'required|max:255',
//    ]);
//        $user = Auth::user()->tasks()->save([
//            'id'=>$request->id,
//            'name'=>$request->name,
//        ]);
//        return redirect(route('tasks.index'));
//})->name('tasks.update');
