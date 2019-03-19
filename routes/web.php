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
 * All tasks page
 */
Route::get('/', function () {

    // Get all data from database table
    $dati = App\Task::get();

    // Return a 'home.blade.php' View
    return view('home', [
        'todo_items' => $dati
    ]);
});


/**
 * Create a new Task from form
 * Form is using method POST, so we are defining a route that
 * responds only if POST method is used.
 */
Route::post('/task/create', function () {

    // Get value posted from input field
    // If nothing is posted then variable = null
    // 
    // @url https://laravel.com/docs/5.8/helpers#method-request
    $new_title = request('input-field--name', null);

    // Check if value is null
    if ($new_title != null) {
        
        // Create new Model
        $task = new App\Task;

        // Set a variable
        $task->title = $new_title;

        // Save the Model to DB
        $task->save();
    }

    // Redirect to homepage
    // @url https://laravel.com/docs/5.8/helpers#method-redirect
    return redirect('/');
});


/**
 * Update a database entry...
 * Mark a task done
 */
Route::get('/task/update/{id}', function ($id) {

    // Get Model by ID
    $task = App\Task::find($id);

    // Toggle is_done value
    if ($task->is_done) {

        // Set a variable
        $task->is_done = false;

    } else {

        // Set a variable
        $task->is_done = true;

    }

    // Save the Model to DB
    $task->save();

    // Redirect to homepage
    // @url https://laravel.com/docs/5.8/helpers#method-redirect
    return redirect('/');
});


/**
 * Delete a database entry
 */
Route::get('/task/delete/{id}', function ($id) {
    // Get Model by ID
    $task = App\Task::find($id);
    
    // Delete that model instance from DB
    $task->delete();

    // Redirect to homepage
    // @url https://laravel.com/docs/5.8/helpers#method-redirect
    return redirect('/');
});


/**
 * Get a single task
 */
Route::get('/task/{mans_id}', function ($mans_id) {

    // Get Model by ID
    $task = App\Task::find($mans_id);

    // Return a 'single-task.blade.php' View
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










