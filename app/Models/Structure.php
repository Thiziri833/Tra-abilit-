<?php

namespace App\Models;

use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory, softDeletes;
    protected $fillable = ['name'];
    public function users()
    {
        return $this->hasMany(User::class, 'structure_id','id');
    }
    public function lines()
    {
        return $this->hasMany(Line::class, 'structure_id','id');
    }
    protected $dates =['deleted_at'];
}
