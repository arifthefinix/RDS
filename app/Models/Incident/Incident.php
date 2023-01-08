<?php

namespace App\Models\Incident;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Incident extends Model
{
    use HasFactory;

    protected $fillable =['title','details', 'status', 'contact_person_name', 'contact_person_number', 'incident_address'];

    public function incidentImages(){
        return $this->hasMany('App\Models\Incident\IncidentImage','incident_id','id');
    }
}
