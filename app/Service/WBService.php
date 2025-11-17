<?php


namespace App\Service;

use Illuminate\Support\Facades\Http;

class WBService
{
    protected $charcs = [
        'authors' => 'Автор',
        'cover' => 'Обложка',
        'lang' => 'Языки',
        'paper_type' => 'Вид бумаги',
        'age_limit' => 'Возрастные ограничения',
        'weight' => 'Вес товара без упаковки (г)',
        'height' => 'Высота предмета',
        'pages' => 'Количество страниц',
        'depth' => 'Глубина предмета',
        'width' => 'Ширина предмета',
        'year' => 'Год выпуска',
        'isbn' => 'ISBN/ISSN',
        'edition' => 'Редакция',
        'country' => 'Страна производства',
    ];


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

    public function getCharcs($subjectID)
    {
        $response = Http::withHeaders([
            'Authorization' => config('services.wildberries.key'),
        ])->get('https://content-api.wildberries.ru/content/v2/object/charcs/' . $subjectID);
        return $response->json();
    }

    public function getBookById($nmID)
    {
        $cards = $this->list();
        $card = [];
        foreach ($cards['cards'] as $item){
            if($item['nmID'] == $nmID){
                $card = $item;
                break;
            }
        }

        foreach ($card['characteristics'] as $item){
            if (false !== $key = array_search($item['name'], $this->charcs)) {
                $card[$key] = $item['value'];
            }
        }

        dump($card);
        $characteristics = $this->getCharcs($card['subjectID']);
        dump($characteristics);
        return $card;
    }
}
