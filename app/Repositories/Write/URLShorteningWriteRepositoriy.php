<?php

namespace App\Repositories\Write;

use App\Exceptions\SavingErrorException;
use App\Models\Link\Link;

class URLShorteningWriteRepositoriy implements URLShorteningWriteRepositoriyInterface
{

    public function save(Link $link): Link
    {
        if (!$link->save()) {
            throw new SavingErrorException();
        }

        return $link;
    }

}
