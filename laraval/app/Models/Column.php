<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
* Column Model
* Has one to many relation to cards
*/
class Column extends Model
{
    use HasFactory;
    protected $fillable = ['json'];
}
