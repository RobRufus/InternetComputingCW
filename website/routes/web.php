<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

<form action="{{action('ItmReqController@approved', $Itmreq['id'])}}"  method="put"> @csrf
  <button  type="submit"> Approve</button>
</form>

<form action="{{action('ItmReqController@declined', $Itmreq['id'])}}"  method="put"> @csrf
  <button  type="submit"> Decline</button>
</form>

*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users','UsersController');
Route::resource('items','ItemsController');

//Route::resource('itmreqs','ItmReqController');

Route::get('request','ItmReqController@index')->name('reqList');

Route::get('request/remove/{value}','ItmReqController@destroy')->name('reqRemove');
Route::get('request/{value}','ItmReqController@create')->name('reqMake');
Route::get('request/edit/{value}','ItmReqController@process')->name('reqProcess');
Route::post('storeRequests','ItmReqController@store')->name('reqStore');
Route::post('updateRequests','ItmReqController@update')->name('reqUpdate');

//Route::PUT|PATCH('itmreq/approveRequest','ItmReqController@approved')->name('reqApprove');
//Route::put|PATCH('itmreq/declineRequest','ItmReqController@declined')->name('reqDecline');
