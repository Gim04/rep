<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Peripheral extends Model
{
    use HasFactory;
    protected $table = 'peripherals';
    protected $primaryKey= 'id';
    protected $fillable = [
        'position',
        'position_id',
        'inventory_number',
        'serial_number',
        'manufacturer_id',
        'model',
        'type_of_peripheral',
        'power_rating',
        'box',
        'description' 
    ];

    public function computer(){
        return $this->belongsToMany(Peripheral::class, 'has', 'belong_id', 'computer_id');
    }
    public function shelves(){
        return $this->belongsTo(shelf::class, 'position_id', 'id');
    }
    public function containers(){
        return $this->belongsTo(container::class, 'position_id', 'id');
    }
    public function boxes(){
        return $this->hasOne(box::class, 'item_id', 'id');
    }

    public function manufacturers(){
        return $this->belongsTo(manufacturer::class, 'manufacturer_id', 'id');
    }

    public function images(){
        return $this->hasMany(issue::class, 'image_id', 'id');
    }

}
