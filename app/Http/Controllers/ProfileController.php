<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $request->user();
    }

    public function update(Request $request, $id)
    {
        if ($request->user()->token) {
            return response()->json(['Message' => "You are not authenticated"]);
        }
        $user = User::find($id);
        $gender = Gender::get();
        $user->update($request->all());
        return response()->json([
            "user" => $user,
            "message" => "user info updated successfully",
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request  $request)
    {
        return response()->json([
            User::destroy($id),
            'message' => "User deleted"
        ]);
    }
}
