<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeletedId extends Model
{
    // use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'deleted_ids';

    // Specify fillable fields
    protected $fillable = ['id'];

    // Disable timestamps if not needed
    public $timestamps = true;

    // Define the primary key
    protected $primaryKey = 'id';

    // Set primary key type to string
    protected $keyType = 'string';

    // Disable auto-incrementing for primary key
    public $incrementing = false;
}
