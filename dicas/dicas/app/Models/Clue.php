<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clue extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'user_id', 'type_id', 'brand_id', 'vehicle_model_id', 'version_id'];
    public $labels = ['Descrição', 'Usuário', 'Tipo', 'Marca', 'Modelo', 'Versão'];
    public $visible = ['description', 'user', 'type', 'brand', 'vehiclemodel', 'version'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function vehiclemodel(){
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }

    public function version(){
        return $this->belongsTo(Version::class);
    }

}
