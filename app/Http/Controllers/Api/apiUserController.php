<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Collection;


class apiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        return response()->json(User::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $addUser = User::create($request->all());
        return response()->json($addUser, 201);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = User::where('id',$id)->first();
        if (is_null($result)){
            return response()-> json(
                [
                    'message' => 'User not found ...'                    
                ], 400
            );
        }

        return response()->json($result,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  dd($request->get('coin'));
        $editUser = User::findorfail($id);
        if (is_null($editUser)){
            return response()->json(
                [
                    'message' =>"Can not find user...."
                ], 404
            );
        }
        
        $editUser->name = $request->get('name');
        $editUser->email = $request->get('email');
        $editUser->gender = $request->get('gender');
        $editUser->coin = $request->get('coin');
        $editUser->password = bcrypt($request->get('password'));
        $editUser ->save();

        return response()->json($editUser, 200);

    }

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getCatalogue(User $user, $id){
       
        $player = $user::find($id);
        $catalogue = $user::find($id)->catalogues;
        $numCat = $catalogue->count();
        $result = new Collection([
            "Player" => $player,
            "TotalCat" =>$numCat,
            "Catalogues" => $catalogue
        ]);
        return response()->json($result, 200);
    }

    public function getAllCatalogue(User $user){
        
        $catalogues =$user::with('catalogues')->get();        
        return response()->json($catalogues,200);
    }

    public function getDress(User $user, $id){
       
        // $dressings = User::find($id)->dressings;        
        $dressing = $user::find($id)->dressings;        

        // dd($dressing);
        return response()->json($dressing, 200);
    }

    public function getAllDressing(User $user){
        $dressings = $user::with('dressings')->get();
        return response()->json($dressings, 200);
    }


    public function getFull(User $user, $id){

        $player = $user::find($id);
        $dressing = $user::find($id)->dressings;
        $numDress = $dressing->count();
        $catalogue = $user::find($id)->catalogues;
        $numCatalogue = $catalogue->count();

        $final = new Collection([
            'Player'=>$player,
            'Info' => ([
                'dressTotal' =>$numDress,
                'cataTotal' =>$numCatalogue
            ]),
            'Catalogues' =>$catalogue,
            'Dressings'=>$dressing
        ]);

        return response()->json($final, 200);
    }


}
