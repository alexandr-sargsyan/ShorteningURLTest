<?php

namespace App\Providers;


use App\Repositories\Read\URLShortening\URLShorteningReadRepositoriy;
use App\Repositories\Read\URLShortening\URLShorteningReadRepositoriyInterface;
use App\Repositories\Write\URLShorteningWriteRepositoriy;
use App\Repositories\Write\URLShorteningWriteRepositoriyInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(
            URLShorteningReadRepositoriyInterface::class,
            URLShorteningReadRepositoriy::class
        );

        $this->app->bind(
            URLShorteningWriteRepositoriyInterface::class,
            URLShorteningWriteRepositoriy::class
        );
    }


}
