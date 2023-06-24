<?php

namespace App\Request\URLShortening;

use Illuminate\Foundation\Http\FormRequest;

class URLShorteningRequest extends FormRequest
{
    const URL = 'url';

    public function rules(): array
    {
        return [
            self::URL => [
                'required',
                'url',
            ],

        ];
    }


    public function getUrl(): string
    {
        return $this->get(self::URL);
    }

}
