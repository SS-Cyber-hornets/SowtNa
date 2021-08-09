<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Http\Resources\AlbumCollection;
use App\Models\Album;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Respons
     */
    public function index()
    {
        return new AlbumCollection(Album::paginate());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {
        $input = $request->all();
        $years = Year::get('year', 'id');
        $album = Album::create($input);
        // $group->setStatus('active');
        $album = Album::find($album->id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $album->addMediaFromRequest('image')->toMediaCollection('album');
        }
        return response()->json([
            'status' => 200,
            'data' => $album,
            'message' => 'album created successfully'
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Album $album)

    {
        return $album->getFirstMedia('album')->getUrl('cover');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, $id)
    {
        $album = Album::find($id);
        $album->update($request->all());
        return response()->json([
            'label' => $album,
            'message' => 'Album updated successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Album::destroy($id);
        return response()->json([
            'status' => '200',
            'message' => " Album is successfully destroyed",
        ]);
    }
}
