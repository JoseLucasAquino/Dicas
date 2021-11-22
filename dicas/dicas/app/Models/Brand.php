<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['description'];

    public function vehicleModels(){
        return $this->hasMany(VehicleModel::class);
    }

    public function types(){
        return $this->belongsToMany(Type::class);
    }
}
