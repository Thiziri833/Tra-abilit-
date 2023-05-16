<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'structure_id',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('id','cadence', 'uniteprod');
    }
    public function structure()
    {
        return $this->belongsTo(Structure::class, 'structure_id', 'id');
    }
}
