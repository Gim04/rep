<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $table = 'issues';
    protected $primaryKey = 'id';
    protected $fillable = [
        'item_id',
        'start_date',
        'solved',
        'finish_date',
        'comment'
    ];
    public function computers() {
        return $this->belongsTo(computer::class, 'item_id', 'id');
    }
    public function keyboards() {
        return $this->belongTo(keyboard::class, 'item_id', 'id');
    }
    public function joysticks() {
        return $this->belongTo(joystick::class, 'item_id', 'id');
    }
    public function monitors() {
        return $this->belongTo(monitor::class, 'item_id', 'id');
    }

    public function cables(){
        return $this->belongTo(cable::class, 'item_id', 'id');
    }
    
    public function mice(){
        return $this->belongsTo(mouse::class, 'position_id', 'id');
    }
}
