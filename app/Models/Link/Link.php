<?php

namespace App\Models\Link;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $fillable = ['short_url', 'long_url'];

    public static function create(string $shortUrl, string $longUrl): self
    {
        $entity = new self();
        $entity->setShortUrl($shortUrl);
        $entity->setLongUrl($longUrl);

        return $entity;
    }

    public function setShortUrl(string $shortUrl): void
    {
        $this->short_url = $shortUrl;
    }

    public function setLongUrl(string $longUrl): void
    {
        $this->long_url = $longUrl;
    }

    public function getShortUrl(): string
    {
        return $this->short_url;
    }

    public function getLongUrl(): string
    {
        return $this->long_url;
    }

}
