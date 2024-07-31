<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restock extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'restocks';

    // Specify the primary key field
    protected $primaryKey = 'id';

    // Disable the auto-increment feature for the primary key
    public $incrementing = false;

    // Specify the data types for the primary key
    protected $keyType = 'string';

    // Define the attributes that are mass assignable
    protected $fillable = [
        'id',
        'supp_id',
        'supp_name',
        'item_id',
        'name_item',
        'buy_price',
        'buy_qty',
        'buy_total',
    ];

    // Define the relationships

    /**
     * Get the supplier that owns the restock.
     */
    // public function supplier()
    // {
    //     return $this->belongsTo(Supplier::class, 'supp_id', 'id');
    // }

    /**
     * Get the item that is restocked.
     */
    // public function item()
    // {
    //     return $this->belongsTo(Item::class, 'item_id', 'id');
    // }
};
