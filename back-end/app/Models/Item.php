<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Item extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'item';
    protected $fillable = [
        'item_name','price', 'note','image_url'
    ];
}
