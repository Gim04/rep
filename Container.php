<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $table = 'containers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'shelf_id',
        'code',
        'description'
    ];

    public function shelves(){
        return $this->belongsTo(shelf::class, 'shelf_id', 'id');
    }

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

}
