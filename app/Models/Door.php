<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
    use HasFactory;
    protected $fillable = ['color_id', 'material_id', 'width_id', 'height_id', 'heandel_id', 'accessory_id', 'opening'];

    public function color()
    {
        $this->hasMany(Color::class);
    }

    public function material()
    {
        $this->hasMany(Material::class);
    }

    public function width()
    {
        $this->hasMany(Width::class);
    }

    public function height()
    {
        $this->hasMany(Height::class);
    }

    public function heandel()
    {
        $this->hasMany(Heandel::class);
    }

    // public function heandel()
    // {
    //     $this->hasMany(Heandel::class);
    // }
}
