<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Event extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'event';
    protected $fillable = [
        'event_name','image_url','description'
    ];
}
