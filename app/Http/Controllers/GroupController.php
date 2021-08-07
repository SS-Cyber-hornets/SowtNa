<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Http\Resources\GroupCollection;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new GroupCollection(Group::paginate());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        $input = $request->all();

        $group = Group::create($input);
        // $group->setStatus('active');

        $group = Group::find($group->id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $group->addMediaFromRequest('image')->toMediaCollection('group');
        }
        return response()->json(['status' => 200, 'data' => $group]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Group $group)

    {
        return $group->getFirstMedia('group')->getUrl('cover');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GroupRequest $request, $id)
    {
        $group = Group::find($id);
        $group->update($request->all());
        return $group;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::destroy($id);
        return response()->json([
            'status' => '200',
            'message' => " Group is successfully destroyed",
        ]);
    }
}
