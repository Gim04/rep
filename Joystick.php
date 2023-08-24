<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joystick extends Model
{
    use HasFactory;

    protected $table = 'joysticks';
    protected $primaryKey= 'id';
    protected $fillable = [
        'bool_position',
        'position_id',
        'manufacturer_id',
        'inventory_number',
        'serial_number',
        'model',
        'year',
        'model',
        'description',
        'icon'
    ];
    
    public function shelves(){
        return $this->belongsTo(shelf::class, 'position_id', 'id');
    }
    public function containers(){
        return $this->belongTo(container::class, 'position_id', 'id');
    }
    
    public function manufacturers(){
        return $this->belongsTo(manufacturer::class, 'manufacturer_id', 'id');
    }

    public function images(){
        return $this->hasMany(image::class, 'item_id', 'id');
    }

    public function issues(){
        return $this->hasMany(issue::class, 'item_id', 'id');
    }

    public function boxes(){
        return $this->hasOne(box::class, 'item_id', 'id');
    }
    public function computer(){
        return $this->belongsToMany(Joystick::class, 'has', 'belong_id', 'computer_id');
    }
}
