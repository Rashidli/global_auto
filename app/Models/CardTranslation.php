<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardTranslation extends Model
{

    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['title', 'content','card_id','locale'];

}
