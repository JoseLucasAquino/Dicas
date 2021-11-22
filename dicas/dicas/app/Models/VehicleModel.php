<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    protected $fillable = ['brand_id', 'description'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function versions(){
        return $this->belongsToMany(Version::class);
    }
}
