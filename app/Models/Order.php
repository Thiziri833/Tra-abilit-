<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Log;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'order_id',
        'numBC',
        'depotdest',
        'dateorder',
        'customer_id',
    ];
    // protected $appends = [
    //     'order_id'
    // ];




    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('id','quantity');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            if (!$model->order_id) {
                $order_id = IdGenerator::generate(['connection' => 'mysql', 'table' => 'orders', 'field' => 'order_id', 'length' => 13, 'prefix' => 'ORD'.date('Y')]);
                Log::debug('Generated ID: '.$order_id);
                $model->setAttribute('order_id', $order_id);
            }
        });
    }
    public function getOrderIdAttribute()
    {
        return $this->attributes['order_id'];
    }
    protected $dates =['deleted_at'];
}
