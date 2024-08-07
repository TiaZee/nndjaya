<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';

    // Disable auto-incrementing IDs
    public $incrementing = false;

    // The primary key type
    protected $keyType = 'string';

    // Specify fillable fields
    protected $fillable = ['id', 'name', 'item_qty', 'supp_id', 'buy_price', 'sale_price', 'item_photo'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supp_id', 'id');
    }
}
