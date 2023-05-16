<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'SSCC',
        'datefab',
        'DLUO',
        'quantiteplt',
        'priting_id',
    ];
}
