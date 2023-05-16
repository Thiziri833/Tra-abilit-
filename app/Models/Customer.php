<?php

namespace App\Models;

use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'wilaya',
        'activite',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if (!$model->code) {
                // $year = Carbon::now()->format('y');
                $code = IdGenerator::generate(['connection' => 'mysql', 'table' => 'customers', 'field' => 'code', 'length' => 13, 'prefix' => 'CST' . date('Y')]);
                Log::debug('Generated ID: ' . $code);
                $model->setAttribute('code', $code);
            }
        });
    }
    public function getOrderIdAttribute()
    {
        return $this->attributes['code'];
    }
}
