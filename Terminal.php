<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Terminal extends Model
{
    use HasFactory;

    protected $table = 'terminals';
    protected $primaryKey= 'id';
    protected $fillable = [
        'position',
        'position_id',
        'inventory_number',
        'serial_number',
        'manufacturer_id',
        'model',
        'submodel',
        'year',
        'power_type',
        'power_rating',
        'monitor',
        'box',
        'description' 
    ];

    public function computer(): MorphToMany
    {
        return $this->morphedByMany(Terminal::class, 'has');
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
