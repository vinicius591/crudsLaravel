<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
       protected $fillable = ['mesa', 'item', 'status'];
       public $timestamps = false;
}

