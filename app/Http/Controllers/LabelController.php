<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabelRequest;
use App\Http\Resources\LabelCollection;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new LabelCollection(Label::paginate());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabelRequest $request)
    {
        $input = $request->all();

        $label = Label::create($input);
        // $group->setStatus('active');

        $label = Label::find($label->id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $label->addMediaFromRequest('image')->toMediaCollection('label');
        }
        return response()->json([
            'status' => 200,
            'data' => $label,
            'message' => 'Label created successfully'
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Label $label)

    {
        return $label->getFirstMedia('label')->getUrl('cover');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LabelRequest $request, $id)
    {
        $label = Label::find($id);
        $label->update($request->all());
        return response()->json([
            'label' => $label,
            'message' => 'Label updated successfully'
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
        $group = Label::destroy($id);
        return response()->json([
            'status' => '200',
            'message' => " Label is successfully destroyed",
        ]);
    }
}
