<?php

namespace App\Http\Controllers;

use App\Http\Requests\RespondentRequest;
use App\Models\Incident\Incident;
use App\Models\Respondent;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RespondentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $respondents = Respondent::with('incidentInfo','teamInfo')->orderBy('id','desc')->get();
        return Inertia::render('Respondent/Index',compact('respondents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();
        $incidents = Incident::all();
        return Inertia::render('Respondent/Create',compact('incidents','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RespondentRequest $request)
    {
        Respondent::create([
           'team_id'=>$request->team_id,
           'incident_id'=>$request->incident_id,
        ]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = Team::all();
        $incidents = Incident::all();
        $respondent = Respondent::find($id);
        return Inertia::render('Respondent/Edit',compact('incidents','teams','respondent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RespondentRequest $request, $id)
    {
        Respondent::find($id)->update([
            'team_id'=>$request->team_id,
            'incident_id'=>$request->incident_id,
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
        Respondent::find($id)->delete();
    }
}
