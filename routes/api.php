<?php

use Illuminate\Http\Request;
use App\Models\Tweet;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('guest')->get('/tweets', function (Request $request) {

	$tweets = Tweet::query()->orderBy('created_at', 'desc')->take(50)->get();
    
    return response()->json($tweets);
});
