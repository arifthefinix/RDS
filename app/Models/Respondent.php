<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respondent extends Model
{
    use HasFactory;
    protected $fillable =['team_id','incident_id'];

    public function teamInfo(){
        return $this->hasOne('App\Models\Team','id','team_id');
    }
    public function incidentInfo(){
        return $this->hasOne('App\Models\Incident\Incident','id','incident_id');
    }
}
