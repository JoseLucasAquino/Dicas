<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clue extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'user_id', 'type_id', 'brand_id', 'vehiclemodel_id', 'version_id'];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function type(){
        return $this->hasOne(Type::class);
    }

    public function brand(){
        return $this->hasOne(Brand::class);
    }

    public function vehiclemodel(){
        return $this->hasOne(VehicleModel::class);
    }

    public function version(){
        return $this->hasOne(Version::class);
    }

}
