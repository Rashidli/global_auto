<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{

    use HasFactory, Translatable, SoftDeletes;
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['image','is_active'];

}
