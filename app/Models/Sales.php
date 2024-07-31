<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'sales';

    // Specify the primary key field
    protected $primaryKey = 'id';

    // Disable the auto-increment feature for the primary key
    public $incrementing = false;

    // Specify the data types for the primary key
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'buyer_name',
        'buyer_address',
        'item_id',
        'name_item',
        'sale_price',
        'sale_qty',
        'sale_total',
    ];
}
