<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'img', 'price'];
    public function door()
    {
        $this->belongsTo(Door::class);
    }
}
