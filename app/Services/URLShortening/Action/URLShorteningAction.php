<?php

namespace App\Services\URLShortening\Action;

use App\Exceptions\LinkDoesNotExistException;
use App\Models\Link\Link;
use App\Repositories\Read\URLShortening\URLShorteningReadRepositoriyInterface;
use App\Repositories\Write\URLShorteningWriteRepositoriyInterface;

class URLShorteningAction
{


    public function __construct(
        protected URLShorteningWriteRepositoriyInterface $URLShorteningWriteRepositoriy,
        protected URLShorteningReadRepositoriyInterface $URLShorteningReadRepositoriy,
    ) {
    }

    public function run(string $url): string
    {
        $shortUrl = $this->generateShortCode($url);
        try {
            $this->URLShorteningReadRepositoriy->getLinkByShortUrl($shortUrl);

            return $shortUrl;
        } catch (LinkDoesNotExistException $exception) {
            $link = Link::create($shortUrl, $url);
            $this->URLShorteningWriteRepositoriy->save($link);

            return $shortUrl;
        }
    }

    private function generateShortCode($url): string
    {
        $hashedUrl = md5($url); // Используем MD5 для хеширования URL
        $codeLength = 10; // Длина кода сокращенной ссылки

        return substr($hashedUrl, 0, $codeLength);
    }


}
