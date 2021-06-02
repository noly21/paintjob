<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaintModel extends Model
{   
    public $timestamps = false;
    protected $table = 'paint_queue';
    protected $fillable = [

        'Plate_no',
        'Current_color',
        'Target_color',
        'action'

    ];

    use HasFactory;
}
