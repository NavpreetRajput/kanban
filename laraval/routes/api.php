<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Column;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware(['cors'])->group(function () {
    Route::post('/columns', 'ColumnController@update');
});
/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

/*Route::get('columns', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Column::all();
});
 
Route::get('columns/{id}', function($id) {
    return Column::find($id);
});

Route::post('columns', function(Request $request) {
    return Column::create($request->all);
});

Route::post('columns/{id}', function(Request $request, $id) {
    $column = Column::findOrFail($id);
    $column->update($request->all());

    return $column;
});

Route::delete('columns/{id}', function($id) {
    Column::find($id)->delete();

    return 204;
});

Route::get('columns', 'ColumnController@index');
Route::get('columns/{column}', 'ColumnController@show');
Route::post('columns', 'ColumnController@store');
Route::post('columns/{column}', 'ColumnController@update');
Route::delete('columns/{column}', 'ColumnController@delete');*/
