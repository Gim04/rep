<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory;
    protected $table = 'shelves';
    protected $primaryKey= 'id';
    protected $fillable = [
        'unity_id',
        'code',
        'description',
    ];
    
    public function computers(){
        return $this->hasMany(computer::class, 'position_id', 'id');
    }

    public function monitors(){
        return $this->hasMany(monitor::class, 'position_id', 'id');
    }

    public function keyboards(){
        return $this->hasMany(keyboard::class, 'position_id', 'id');
    }

    public function joysticks(){
        return $this->hasMany(joystick::class, 'position_id', 'id');
    }

    public function cables(){
        return $this->hasMany(cable::class, 'position_id', 'id');
    }
    public function mice(){
        return $this->hasMany(mouse::class, 'position_id', 'id');
    }

    public function containers(){
        return $this->hasMany(container::class, 'shelf_id', 'id');
    }
    public function units(){
        return $this->belongsTo(unity::class, 'unity_id', 'id');
    }
}
