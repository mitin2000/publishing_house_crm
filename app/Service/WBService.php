<?php


namespace App\Service;

use Illuminate\Support\Facades\Http;

class WBService
{
    public function list()
    {
        $settings = ['settings' => [
            'cursor' =>[
                'limit' => 100
            ],
            'filter' => [
                'withPhoto' => -1
            ]
        ],

        ];
        $response = Http::withHeaders([
            'Authorization' => config('services.wildberries.key'),
        ])->post('https://content-api.wildberries.ru/content/v2/get/cards/list', $settings);
        return $response->json();
    }
}
