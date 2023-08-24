<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Computer extends Model
{
    use HasFactory;
    protected $table = 'computers';
    protected $primaryKey= 'id';
    protected $guarded = [];
    protected $fillable = [
        'position_id',
        'bool_position',
        'manufacturer_id',
        'inventory_number',
        'serial_number',
        'model',
        'submodel',
        'processor',
        'power',
        'speed',
        'year',
        'bit',
        'icon',
        'description'
    ];

     
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
    public function terminals()
    {
        return $this->belongsToMany(Mouse::class, 'has', 'computer_id', 'belong_id');
    }
    public function mice()
    {
        return $this->belongsToMany(Mouse::class, 'has', 'computer_id', 'belong_id');
    }
    public function peripherals()
    {
        return $this->belongsToMany(Mouse::class, 'has', 'computer_id', 'belong_id');
    }
    public function joysticks()
    {
        return $this->belongsToMany(Mouse::class, 'has', 'computer_id', 'belong_id');
    }

}
