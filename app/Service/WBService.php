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
//        dump($cards);
        $card = [];
        foreach ($cards['cards'] as $item){
            if($item['nmID'] == $nmID){
                $card['nmID'] = $item['nmID'];
                $card['imtID'] = $item['imtID'];
                $card['nmUUID'] = $item['nmUUID'];
                $card['subjectID'] = $item['subjectID'];
                $card['vendorCode'] = $item['vendorCode'];
                $card['title'] = $item['title'];
                $card['description'] = $item['description'];
                $card['img'] = $item['photos'][0]['big'];
                $card['preview_img'] = $item['photos'][0]['c246x328'];

                foreach ($item['characteristics'] as $chars){
                    if (false !== $key = array_search($chars['name'], $this->charcs)) {
                        $card[$key] = $chars['value'];
                    }
                }
                break;
            }
        }

//        dump($card);
//        $characteristics = $this->getCharcs($card['subjectID']);
//        dump($characteristics);
        return $card;
    }
}
