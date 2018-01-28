<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function getHomePage() {

    	return view('youtube');
    }

    public function getPlayList(Request $request) {

    	$url = $request->input('youtube_url');

    	$query = parse_url($url, PHP_URL_QUERY);
    	parse_str($query, $params);

    	$playlist_id = $params['list'];

		$client = new \GuzzleHttp\Client();

		$api_key = ENV('API_KEY');

		$pageToken = "";

		$items = [];

		do {
			$res = $client->request('GET', 'https://www.googleapis.com/youtube/v3/playlistItems', [
				'query' => [ 
					'part' => 'snippet,status', 
					'playlistId' => $playlist_id,  
					'maxResults' => 50,
					'pageToken' => $pageToken,
					'key' => $api_key
				]
			]);

			$contents = json_decode($res->getBody()->getContents());

			$pageToken = isset($contents->nextPageToken) ? $contents->nextPageToken : "";

			foreach($contents->items as $item) {

				$items[] = $item;
			}
		
		} while(!empty($pageToken));

		var_dump($items);

		return view('playlist', compact('items'));
    }
}
