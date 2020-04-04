<?php
use App\Training;

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

//routes/web.php
Route::get('/', function () {
    $trainings=Training::all();
    return view('landingpage')->with(compact('trainings'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//routes/web.php
//simple routing route for training module
//Route::get('/trainings', 'TrainingController@index')->name('training:index');
//Route::get('/trainings/create', 'TrainingController@create')->name('training:create');
//Route::post('/trainings/create', 'TrainingController@store')->name('training:store');

//group routing
//for training module
Route::group([
    'middleware'=>'auth',//lock this route group to only authenticated users
    'prefix'=>'trainings',
    'as'=>'training:',
],function(){
    Route::get('/', 'TrainingController@index')->name('index');
    Route::get('/create', 'TrainingController@create')->name('create');
    Route::post('/create', 'TrainingController@store')->name('store');
    Route::get('/{training}', 'TrainingController@show')->name('show');
    Route::get('/{training}/edit', 'TrainingController@edit')->name('edit');
    Route::post('/{training}', 'TrainingController@update')->name('update');
    Route::post('/{training}/delete', 'TrainingController@delete')->name('delete');
});