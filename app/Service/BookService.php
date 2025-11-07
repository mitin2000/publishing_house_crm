<?php

namespace App\Service;

use App\Models\Book;
use App\Models\WB;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BookService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            if (isset($data['author_ids'])){
                $authorIds = $data['author_ids'];
                unset($data['author_ids']);
            }

            // Загрузка изображений
            if(isset($data['prev_img'])){
                $data['prev_img'] = Storage::disk('public')->put('/images', $data['prev_img']);
            }
            if (isset($data['prev_img_wb'])){
                $data['prev_img'] = $this->image_upload($data['prev_img_wb']);
                unset($data['prev_img_wb']);
            }
            if(isset($data['image'])){
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            if (isset($data['image_wb'])){
                $data['image'] = $this->image_upload($data['image_wb']);
                unset($data['image_wb']);
            }

            if(isset($data['utp'])){
                $data['utp'] = Storage::disk('public')->put('/utps', $data['utp']);
            }

            // Запись данных карточки WB
            if(isset($data['nmID'])){
                $dataWB['nmID'] = $data['nmID'];
                $dataWB['imtID'] = $data['imtID'];
                $dataWB['nmUUID'] = $data['nmUUID'];
                $dataWB['subjectID'] = $data['subjectID'];
                unset($data['nmID']);
                unset($data['imtID']);
                unset($data['nmUUID']);
                unset($data['subjectID']);
                $WBItem = WB::firstOrCreate($dataWB);
            }

            $book = Book::firstOrCreate($data);
            if (isset($authorIds)){
            $book->authors()->attach($authorIds);
            }
            if (isset($WBItem)){
                $WBItem->update(['book_id' => $book->id]);
            }

            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
            dd($exception);
            abort(404);
        };

    }
    public function update($data, $book)
    {
        try {
            DB::beginTransaction();
            if (isset($data['author_ids'])){
                $authorIds = $data['author_ids'];
                unset($data['author_ids']);
            }

            if (isset($data['prev_img'])){
                $data['prev_img'] = Storage::disk('public')->put('/images', $data['prev_img']);
            }
            if (isset($data['image'])){
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            }
            if (isset($data['utp'])){
                $data['utp'] = Storage::disk('public')->put('/utps', $data['utp']);
            }

            $book->update($data);
            if (isset($authorIds)){
            $book->authors()->sync($authorIds);
            }
            DB::commit();

        }
        catch (\Exception $exception){
            DB::rollBack();
            abort(500);
        };
            return $book;
    }

    private function image_upload($url)
    {
        try {
            $response = Http::get($url);
            if ($response->successful()) {
                $extension = pathinfo($url, PATHINFO_EXTENSION);
                $filename = 'images/' . Str::random(40) . '.' . $extension;
                Storage::disk('public')->put($filename, $response->body());
                return $filename;
            } else {
                echo "Не удалось скачать файл. Код состояния: " . $response->status();
            }
        } catch (\Exception $e) {
            echo "Произошла ошибка при скачивании файла: " . $e->getMessage();
        }
    }

}
