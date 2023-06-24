<?php

namespace App\Repositories\Read\URLShortening;

use App\Exceptions\LinkDoesNotExistException;
use App\Models\Link\Link;
use Illuminate\Database\Eloquent\Builder;

class URLShorteningReadRepositoriy implements URLShorteningReadRepositoriyInterface
{
    public function query(): Builder
    {
        return Link::query();
    }

    /**
     * @throws LinkDoesNotExistException
     */
    public function getLinkByShortUrl(string $shortUrl): Link
    {
        $query = $this->query();

        $link = $query->where('short_url', $shortUrl)->first();
        if (is_null($link)) {
            throw new LinkDoesNotExistException();
        }

        return $link;
    }

}
