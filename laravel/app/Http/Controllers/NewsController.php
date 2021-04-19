<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class NewsController extends Controller
{
	public function news()
	{
		try {
			$url = config('newsapi.news_api_url') . "everything?qInTitle=car&language=jp&sortBy=publishedAt&apiKey=" . config('newsapi.news_api_key');
			$method = "GET";
			$count = 10;

			$client = new Client();
			$response = $client->request($method, $url);

			$results = $response->getBody();
			$articles = json_decode($results, true);

			$news = [];

			for ($id = 0; $id < $count; $id++) {
				array_push($news, [
					'name' => $articles['articles'][$id]['title'],
					'url' => $articles['articles'][$id]['url'],
					'thumbnail' => $articles['articles'][$id]['urlToImage'],
				]);
			}
		} catch (RequestException $e) {
			echo Psr7\Message::toString($e->getRequest());
			if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }
        return view('page.news', compact('news'));
    }
}
