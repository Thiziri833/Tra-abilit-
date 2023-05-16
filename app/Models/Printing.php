<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Production;

class Printing extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'dateimp',
        'quantite',
        'LOT',
        'date_inst',
        'user_id',
        'production_id',
    ];

    public function productions()
    {
        return $this->hasMany(Production::class);
    }
    
}
