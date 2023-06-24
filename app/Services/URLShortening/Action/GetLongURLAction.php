<?php

namespace App\Services\URLShortening\Action;

use App\Repositories\Read\URLShortening\URLShorteningReadRepositoriyInterface;

class GetLongURLAction
{
    public function __construct(
        protected URLShorteningReadRepositoriyInterface $URLShorteningReadRepositoriy,
    ) {
    }

    public function run( $shortUrl): string
    {
        $longUrl = $this->URLShorteningReadRepositoriy->getLinkByShortUrl($shortUrl);

        return $longUrl->getLongUrl();
    }
}
