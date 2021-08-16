<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Api\Catalogue;
use App\Api\Dressing;
use Illuminate\Support\Collection;


class apiUserController extends Controller
{
   
    public function getUsers(User $user){
        
        return response()->json($user::all(),200);
    }

    public function getUsersCatalogue(User $user){
        return response()->json($user::with('catalogues')->get(),200);
    }

    public function getUsersDressing(User $user){
        return response()->json($user::with('dressings')->get(),200);
    }

    public function getUsersFull(User $user){
        return response()->json($user::with('catalogues', 'dressings')->get(),200);
    }


    public function getUser($id){

        $user = User::findorfail($id);

        if (is_null($user)){
            return response()->json(['message'=>'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    public function getUserDressing($id){

        $user = User::find($id);

        if (is_null($user)){
            return response()->json(['message'=>'User not found'], 404);
        }

        $user =User::find($id);
        $dressing =User::find($id)->dressings;
        $numDress = $dressing->count();

        $result = new Collection([
            'data'=>$user,
            'numDress'=>$numDress,
            'dressings'=>$dressing
        ]);
        
        return response()->json($result, 200);
    }

    public function getUserCatalogue(User $user, $id){

        $user = User::find($id);

        if (is_null($user)){
            return response()->json(['message'=>'User not found'], 404);
        }

        $user =User::find($id);
        $catalogues =User::find($id)->catalogues;
        $numCat = $catalogues->count();

        $result = new Collection([
            'data'=>$user,
            'numCat'=>$numCat,
            'catalogues'=>$catalogues
        ]);
        
        return response()->json($result, 200);
    }
    
    public function getUserFull($id){
        $user = User::find($id);
        $result = new Collection ([
            'data' => $user,
            'catNum' =>$user->catalogues->count(),
            'dressNum'=>$user->dressings->count(),
        ]);

        
        return response()->json($result, 200);
    }


    public function createUser(Request $request){

       
        $user = User::create($request->all());

        return response()->json([
            'message'=>"Created user successfully"
        ],201);
    }


    public function createCatalogue(Request $request, $id){
       
        $user = User::find($id);

        if (is_null($user)){
            return response()->json(['message'=>'User not existing and can not create catalogue'], 404);
        }

        $requestArr = array_merge($request->all(), ['user_id' => $id]);
        $catalogue = Catalogue::create($requestArr);
    

        return response()->json(['message'=> "Dressing of {$user->name}  addedly"], 201);
    }

    public function createDressing(Request $request, $id){
        
        $user = User::find($id);

        if (is_null($user)){
            return response()->json(['message'=>'User not existing and can not create Dressing'], 404);
        }

        $requestArr = array_merge($request->all(),['user_id'=>$id]);
        $dressing = Dressing::create($requestArr);
    

        return response()->json(['message'=> "Catalogue of {$user->name}  addedly"], 201);
    }





}
