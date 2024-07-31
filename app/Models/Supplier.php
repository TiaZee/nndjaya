<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'city',
        'address',
        'bank',
        'bank_number',
    ];
    public function items()
    {
        return $this->hasMany(Item::class, 'supp_id');
    }
}
