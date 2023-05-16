<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Printing;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Log;

class Production extends Model
{
    use HasFactory;
    protected $fillable = [
        'production_id',
        'dateprod',
        'equipe',
        'quart',
        'structure_id',
        'line_id',
        'product_id',
    ];

    public function printings()
{
    return $this->belongsTo(Printing::class);
}

public function product()
{
    return $this->belongsTo(Product::class ,'product_id', 'id');
}
public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if (!$model->production_id) {
                $production_id = IdGenerator::generate(['connection' => 'mysql', 'table' => 'productions', 'field' => 'production_id', 'length' => 13, 'prefix' => 'PRD'.date('Y')]);
                Log::debug('Generated ID: '.$production_id);
                $model->setAttribute('production_id', $production_id);
            }
        });
    }
    public function getOrderIdAttribute()
    {
        return $this->attributes['production_id'];
    }

}
