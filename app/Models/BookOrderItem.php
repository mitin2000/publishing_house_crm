<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookOrderItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'book_order_items';
    protected $guarded = false;

    public function books() {
        return $this->belongsTo(Book::class);
    }
}
