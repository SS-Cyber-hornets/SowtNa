<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackRequest;
use App\Http\Resources\TrackCollection;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Respons
     */
    public function index()
    {
        return new TrackCollection(Track::paginate());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrackRequest $request)
    {
        $input = $request->all();
        // $years = Year::get('year', 'id');
        $track = Track::create($input);
        // $group->setStatus('active');
        $track = Track::find($track->id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $track->addMediaFromRequest('image')->toMediaCollection('track');
        }
        if ($request->hasFile('source') && $request->file('source')->isValid()) {
            $track->addMediaFromRequest('source')->toMediaCollection('track_files');
        }
        return response()->json([
            'status' => 200,
            'track' => $track,
            'message' => 'track uploaded successfully'
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Track $track)

    {
        return response()->json([
            'track' => $track
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TrackRequest $request, $id)
    {
        $track = Track::find($id);
        $track->update($request->all());
        return response()->json([
            'label' => $track,
            'message' => 'Update updated successfully'
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
        $track = Track::destroy($id);
        return response()->json([
            'status' => '200',
            'message' => " Album is successfully destroyed",
            'track' => $track
        ]);
    }
}
