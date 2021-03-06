<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenderRequest;
use App\Http\Resources\GenderCollection;
use App\Http\Resources\GenderResource;
use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new GenderCollection(Gender::paginate());
    }

    public function store(GenderRequest $request)
    {
        $gender = Gender::create($request->all());
        return $gender;
    }

    /**
     * Display the specified resource.
     *
     * @param  si $id
     * @return \Illuminate\Http\Response
     */

    public function show(Gender $gender)
    {
        return $gender;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GenderRequest $request, $id)
    {
        if (!$request->use()->token) {
            return response()->json(['
           message' => 'This is not your accout']);
        }
        $user = User::find($request->id);
        $gender = Gender::find($id);
        $gender->update($request->all());
        return response()->json($gender, 201);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Gender::destroy($id);
    }
}
