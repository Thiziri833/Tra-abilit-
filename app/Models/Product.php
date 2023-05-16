<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
       'code', 'description','DLUO',
    ];
    public function lines()
    {
        return $this->hasMany(Line::class);
    }
     public function productions()
    {
        return $this->hasMany(Production::class,'product_id', 'id');
    }
    
    protected $dates =['deleted_at'];
}
