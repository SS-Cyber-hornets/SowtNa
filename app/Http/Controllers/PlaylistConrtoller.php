<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaylistRequest;
use App\Http\Resources\PlaylistCollection;
use App\Models\Playlist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PlaylistConrtoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PlaylistCollection(Playlist::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaylistRequest $request)
    {
        $playlist = Playlist::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'user_id' => $request->user()->id,
            'image' => $request->image
        ]);
        // $playlist->setStatus('active');
        $playlist = Playlist::find($playlist->id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $playlist->addMediaFromRequest('image')->toMediaCollection('playlist_cover');
        }
        return response()->json(['status' => 200, 'data' => $playlist]);
    }

    public function add_to_playlist(Request $request, Playlist $playlist, Track $track)
    {
        $playlist = Playlist::find($playlist->id);
        $track = Track::find($track->id);
        $playlist->playlist()->attach($track);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        return $playlist;
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
        //
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
}
