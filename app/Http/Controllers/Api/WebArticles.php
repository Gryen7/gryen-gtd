<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\WebArticleRequest;
use DOMDocument;
use DomXPath;
use GuzzleHttp;

class WebArticles extends Controller
{
    public function getArticleData(WebArticleRequest $request)
    {
        libxml_use_internal_errors(true);
        $url = $request->get('url');
        $html = null;
        $client = new GuzzleHttp\Client();

        try {
            $res = $client->request('GET', $url);
            $html = $res->getBody();
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            report($e);
        }

        $xmlDoc = new DOMDocument();

        $xmlDoc->loadHTML($html);

        $finder = new DomXPath($xmlDoc);

        $nodes = $finder->query(('//*[@class="article-content"]'));
        $newnode = $nodes->item(0);

        $tmpDoc = new DOMDocument();

        $tmpDoc->appendChild($tmpDoc->importNode($newnode, true));

        $articleContent = $tmpDoc->saveHTML();

        return response($articleContent);
    }

    public function webArticleTpl()
    {
        return view('web-articles.article-tpl');
    }
}
