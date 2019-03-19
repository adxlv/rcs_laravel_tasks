<?php

// use Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * All tasks
 */
Route::get('/', function () {

    $dati = App\Task::get();

    return view('home', [
        'todo_items' => $dati
    ]);
});


/**
 * Create a new Task
 */
Route::post('/task/create', function () {
    $new_title = request('input-field--name');

    if ($new_title != null) {
        
        $task = new App\Task;
        $task->title = $new_title;

        $task->save();
    }

    return redirect('/');
});


/**
 * Update a database entry...
 * Mark a task done
 */
Route::get('/task/update/{id}', function ($id) {

    $task = App\Task::find($id);

    if ($task->is_done) {
        $task->is_done = false;
    } else {
        $task->is_done = true;
    }

    $task->save();

    return redirect('/');
});


/**
 * Delete a database entry
 */
Route::get('/task/delete/{id}', function ($id) {
    $task = App\Task::find($id);
    $task->delete();
    return redirect('/');
});


/**
 * Get a single task
 */
Route::get('/task/{mans_id}', function ($mans_id) {

    $task = App\Task::find($mans_id);

    return view('single-task', [
        'todo_item' => $task
    ]);
});



// Route::get('/contacts', function () {
//     return view('contacts');
// });


// Route::get('/info', function () {
//     return view('info');
// });


// Route::get('/blog', function () {
//     return view('blog');
// });










