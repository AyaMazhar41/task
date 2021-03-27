<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'status', 'project_id'
    ];
    public function getCreatedAtAttribute($val)
    {
    return \Carbon\Carbon::parse($val)->format('d/m/y');
    }

    public function getUpdatedAtAttribute($val)
    {
    return \Carbon\Carbon::parse($val)->format('d/m/y');
    }
   
    public function scopeSelection($query){
        return $query->select('id','name','status','project_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class,'project_id');
    }
}
