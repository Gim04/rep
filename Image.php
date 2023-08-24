<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    protected $primaryKey= 'id';
    protected $fillable = [
        'item_id',
        'path',
        'description',
    ];
    
    public function computers() {
        return $this->belongsTo(computer::class, 'item_id', 'id');
    }
    public function keyboards() {
        return $this->belongsTo(keyboard::class, 'item_id', 'id');
    }
    public function joysticks() {
        return $this->belongsTo(joystick::class, 'item_id', 'id');
    }
    public function monitors() {
        return $this->belongsTo(monitor::class, 'item_id', 'id');
    }
    public function cables(){
        return $this->belongsTo(cable::class, 'item_id', 'id');
    }
    public function mice(){
        return $this->belongsTo(mouse::class, 'position_id', 'id');
    }
}