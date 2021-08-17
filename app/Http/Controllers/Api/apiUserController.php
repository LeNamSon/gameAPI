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

        if (!($user)){
            return response()->json(['message'=>'User not found'], 404);
        }

        return response()->json($user, 200);
    }

    public function getUserDressing($id){

        $user = User::find($id);

        if (!($user)){
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

    //Finding user by name
    public function getUserName(Request $request,$name){
        dd($request->all());
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
    

        return response()->json(['message'=> "Catalogue of {$user->name}  addedly"], 201);
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


    public function editUser(Request $request, $id){
        $user = User::find($id);

        if (is_null($user)){
            return response()->json(['message'=>'User not existing and can not edit'], 404);
        }

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->gender = $request->get('gender');
        $user->coin = $request->get('coin');

        $user->save();

        return response()->json(['message'=> "Profile {$user->name}  edit successfully "], 201);
    }

    public function editUserCat(Request $request, $id, $game_id){
        ;
        $user = User::find($id);

        if (!($user)){
            return response()->json(['message'=>'User not existing and can not edit catalogue'], 404);
        }
        
        
            
            $catalogue = Catalogue::where('id', '=', $game_id)
                    ->where('user_id', '=', $id)->first();
            if (!$catalogue){
                return response()->json(['message' => "No catalogue for update"],404);
            } else{

                $catalogue->ranking = $request->get('ranking');
                $catalogue->win = $request->get('win');
                $catalogue->lose = $request->get('lose');
                $catalogue->user_id = $id;
         
                $catalogue->save();
            }
       
            
        

        return response()->json(['message'=> "Catalogue of {$user->name}  edit successfully "], 201);
    }

    public function editUserDress(Request $request, $id, $dressing_id){
        $user = User::find($id);

        if (is_null($user)){
            return response()->json(['message'=>'User not existing and can not edit dressing'], 404);
        }

        $dressing = Dressing::where('id', '=', $dressing_id)
                    ->where('user_id', '=', $id)->first();
            if (!$dressing){
                return response()->json(['message' => "No dressing for update"],404);
            } else{

                $dressing->gender   = $request->get('gender');
                $dressing->hairStyle    = $request->get('hairStyle');
                $dressing->hairColor = $request->get('hairColor');
                $dressing->eyeStyle = $request->get('eyeStyle');
                $dressing->skinStyle = $request->get('skinStyle');
                $dressing->glassesStyle = $request->get('glassesStyle');
                $dressing->glassesColor = $request->get('glassesColor');
                $dressing->chestStyle = $request->get('chestStyle');
                $dressing->chestColor = $request->get('chestColor');
                $dressing->legStyle = $request->get('legStyle');
                $dressing->legColor = $request->get('legColor');
                $dressing->feetStyle = $request->get('feetStyle');
                $dressing->feetColor = $request->get('feetColor');
                $dressing->user_id = $id;
                $dressing->save();
            }

        return response()->json(['message'=> "Dressing of {$user->name}  edit successfully "], 201);
    }

    public function deleteUser($id){
         $user = User::find($id);

        if (!$user){
            return response()->json(['message' =>" Can not find user"], 404);
        }

        $user->delete();

        return response()->json(['message'=>"User {$user->name} deleted successfully"], 204);

    }
    
    public function deleteUserCatalogue($id, $game_id){
        $catalogue = Catalogue::find($game_id);

        if(!$catalogue){
            return response()->json(['message' =>" Can not find catalogue"], 404);
        }

        $catalogue->delete();

        return response()->json(['message'=>"Catalogue of {$user->name} deleted successfully"], 204);
    }
    
    public function deleteUserDressing($id, $dressing_id){
    
    }


}
