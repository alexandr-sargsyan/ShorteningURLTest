<?php

namespace App\Request\URLShortening;

use Illuminate\Foundation\Http\FormRequest;

class GetUrlRequest extends FormRequest
{
    const SHORT_URL = 'shortUrl';

    public function rules()
    {
        return [
            self::SHORT_URL => [
                'required',
            ],
        ];
    }

    public function getShortUrl()
    {
        return $this->input(self::SHORT_URL);
    }


}
