<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookOrder extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'book_orders';
    protected $guarded = false;

    public function items() {
        return $this->hasMany(BookOrderItem::class);
    }
}
