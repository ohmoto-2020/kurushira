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
			// リクエストURLの組み立て
			// タイトルまたはコンテンツ内で「car」を検索 & 日本 & 新着順
			$url = config('newsapi.news_api_url') . "everything?qInTitle=car&language=jp&sortBy=publishedAt&apiKey=" . config('newsapi.news_api_key');

			$method = "GET";
			// 取得件数
			$count = 10;

			$client = new Client();
			// リクエストの送信
			$response = $client->request($method, $url);

			// レスポンス本文の取得
			$results = $response->getBody();
			// json文字列を連想配列にする
			$articles = json_decode($results, true);

			$news = [];

			for ($id = 0; $id < $count; $id++) {
				// 記事を配列に追加
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
