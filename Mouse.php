<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class Mouse extends Model
{
    use HasFactory;

    protected $table = 'mice';
    protected $primaryKey= 'id';
    protected $fillable = [
        'position',
        'position_id',
        'manufacturer_id',
        'inventory_number',
        'serial_number',
        'model',
        'year',
        'box',
        'description' 
    ];

    public function computer(): MorphToMany
    {
        return $this->morphedByMany(Mouse::class, 'has');
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
