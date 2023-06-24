<?php

namespace App\Repositories\Read\URLShortening;

use App\Models\Link\Link;

interface URLShorteningReadRepositoriyInterface
{
    public function getLinkByShortUrl(string $shortUrl): Link;
}
