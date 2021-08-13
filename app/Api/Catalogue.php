<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Catalogue extends Model
{
    protected $fillable =['gender','coin'];

    public function userCatalogues(){
        return $this -> belongsTo('App\User');
    }
}
