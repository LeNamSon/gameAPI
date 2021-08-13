<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Dressing extends Model
{
    protected $fillable =['gender',
        'hairStyle',
        'hairColor',
        'eyeStyle',
        'skinStyle',
        'glassesStyle',
        'glassesColor',
        'chestStyle',
        'chestColor',
        'legStyle',
        'legColor',
        'feetStyle',
        'feetColor'
    ];


    public function userDressings() {
        return $this->belongsTo('App\User');
    }
}
