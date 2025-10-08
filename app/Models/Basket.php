<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $table = 'basket';
    protected $guarded = false;

    public function book() {
        return $this->belongsTo(Book::class);
    }
/*
    private function change($id, $count = 0)
    {
        if ($count == 0) {
            return;
        }
    }
*/
}
