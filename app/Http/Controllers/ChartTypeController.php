<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChartTypeRequest;
use App\Http\Resources\ChartTypeCollection;
use App\Models\ChartType;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ChartTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ChartTypeCollection(ChartType::paginate());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChartTypeRequest $request)
    {

        $chart_types = ChartType::create($request->all());
        return $chart_types;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ChartType $chart_type)
    {
        return $chart_type;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChartTypeRequest $request, $id)
    {
        $chart_type = ChartType::find($id);
        $chart_type->update($request->all());
        return $chart_type;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ChartType::destroy($id);
    }
}
