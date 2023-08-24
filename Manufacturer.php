<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $table = 'manufacturers';
    protected $primaryKey= 'id';
    protected $fillable = [
        'name',
        'country_id',
        'link',
        'description',
    ];

    public function countries() {
        return $this->belongsTo(country::class, 'country_id', 'id');
    }

    public function computers() {
        return $this->hasMany(computer::class, 'manufaturer_id', 'id');
    }
    public function keyboards() {
        return $this->hasMany(keyboard::class, 'manufaturer_id', 'id');
    }
    public function joysticks() {
        return $this->hasMany(joystick::class, 'manufaturer_id', 'id');
    }
    public function monitors() {
        return $this->hasMany(monitor::class, 'manufaturer_id', 'id');
    }
    public function mice(){
        return $this->hasMany(mouse::class, 'position_id', 'id');
    }
}
