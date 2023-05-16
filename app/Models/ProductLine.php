<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'line_id',
        'cadence',
        'uniteprod',
    ];
}
