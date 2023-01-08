<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncidentRequest;
use App\Models\Incident\Incident;
use App\Models\Incident\IncidentImage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::orderBy('id','desc')->get();
        return Inertia::render('Incident/Index',compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Incident/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncidentRequest $request)
    {
        $incident =Incident::create([
            'title'=>$request->title,
            'details'=>$request->details,
            'status'=>$request->status,
            'contact_person_name'=>$request->contact_person_name,
            'contact_person_number'=>$request->contact_person_number,
            'incident_address'=>$request->incident_address,
        ]);


        $images = $request->image? explode('|',$request->image):[];


        foreach ($images as $image){
            IncidentImage::create([
                'incident_id'=>$incident->id,
                'incident_image'=>$image,
            ]);
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
        $incident = Incident::where('id',$id)->with('incidentImages')->get();
        return Inertia::render('Incident/Show',compact('incident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incident_info = Incident::find($id);
        return Inertia::render('Incident/Edit',compact('incident_info'));
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
        Incident::find($id)->update([
            'title'=>$request->title,
            'details'=>$request->details,
            'status'=>$request->status,
            'contact_person_name'=>$request->contact_person_name,
            'contact_person_number'=>$request->contact_person_number,
            'incident_address'=>$request->incident_address,
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
        Incident::find($id)->delete();
    }

    public function uploadImage(Request $request){
        if ($request->hasFile('imageFilePond')){
            return $request->file('imageFilePond')->store('images');
        }
    }
}
