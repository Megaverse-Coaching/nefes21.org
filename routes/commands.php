<?php

use Psr\Http\Message\UriInterface;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;

Route::get('/sitemap', function () {
    SitemapGenerator::create(urlToBeCrawled: env('APP_URL'))
        ->shouldCrawl(function (UriInterface $url) {
            return !str_contains($url->getPath(), '/admin');
        })
        ->configureCrawler(function (Crawler $crawler) {
            $crawler->ignoreRobots();
        })
        ->writeToFile(public_path('sitemap.xml'));
    return "sitemap created";
})->name('sitemap');
