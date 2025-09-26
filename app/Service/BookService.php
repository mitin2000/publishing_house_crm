<?php

namespace App\Service;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

            $data['prev_img'] = Storage::disk('public')->put('/images', $data['prev_img']);
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            if(isset($data['utp'])){
                $data['utp'] = Storage::disk('public')->put('/utps', $data['utp']);
            }


            $book = Book::firstOrCreate($data);
            if (isset($authorIds)){
            $book->authors()->attach($authorIds);
            }

            DB::commit();
        }
        catch (\Exception $exception){
            DB::rollBack();
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

}
