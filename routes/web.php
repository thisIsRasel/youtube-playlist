<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', function(){

	return view('auth.user');
});

Route::get('youtube', function() {

	$client = new GuzzleHttp\Client();

	$api_key = 'your_api_key';

	$res = $client->request('GET', 'https://www.googleapis.com/youtube/v3/playlistItems', [
		'query' => [ 
			'part' => 'snippet,contentDetails,status', 
			'playlistId' => 'PL3oW2tjiIxvQ1BZS58qtot3-p-lD32oWT',  
			'maxResults' => 50,
			//'pageToken' => 'CDIQAA',
			'key' => $api_key
		]
	]);

	$body = $res->getBody();
	$contents = json_decode($body->getContents());

	/*if(isset($contents->nextPageToken)) {
		echo $contents->nextPageToken;
	}*/

	return view('youtube', compact('contents'));
});
