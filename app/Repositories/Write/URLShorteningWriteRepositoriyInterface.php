<?php

namespace App\Repositories\Write;

use App\Models\Link\Link;

interface URLShorteningWriteRepositoriyInterface
{

    public function save(Link $link): Link;

}
