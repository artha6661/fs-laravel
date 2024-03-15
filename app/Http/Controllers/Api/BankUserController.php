<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BankUser;
use Exception;
use Illuminate\Database\Query\Expression;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\Catch_;
use PhpParser\Node\Stmt\TryCatch;

class BankUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return BankUser::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'date_of_birth' => 'required',
                'email' => 'required|unique:bankuser'
            ]);

            if($validator->fails()){
                return response() -> json(['error' => $validator->errors()]);
            }
            return BankUser::create($request->all());

        }catch(Exception $e){
            return response() -> json(['message' => 'Error Occured'.$e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $user = BankUser::findOrFail($id);
            $user->update($request->all());
            return $user;

        }catch(Exception $e){
            return response() -> json(['message' => 'Error Occured'.$e->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $validator = Validator::make(['id'=> $id],[
                'id' => 'required|exists:bankuser,id'
            ]);
            if($validator->fails()){
                return response() -> json(['error' => $validator->errors()]);
            }

            $user = BankUser::findOrFail($id);
            $user->delete();
            return response()->json(['message'=>"user with $user->id user is deleted succesfully"]);
        }catch(Exception $e){
            return response() -> json(['message' => 'Error Occured'.$e->getMessage()],500);
        }
    }
}
