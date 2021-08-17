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

    public function scopefindCat($user_id, $game_id){
        return $this->Catalogue::where('id', '=', $game_id)
                ->where('user_id', '=', $user_id)
        ->get();        
    }
}
