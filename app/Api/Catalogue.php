<?php

namespace App\Api;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Catalogue extends Model
{
    protected $fillable =['ranking','win','lose','user_id'];

    protected $hidden = ['created_at','updated_at'];

    public function userCatalogues(){
        return $this -> belongsTo(User::class);
    }
}
