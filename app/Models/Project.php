<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start_at',
        'end_at',
        'creator',
    ];
    public function scopeSelection($query){
        return $query->select('id','name','start_at','end_at','creator');
    }
    public function getCreatedAtAttribute($val)
    {
    return \Carbon\Carbon::parse($val)->format('d/m/y');
    }

    public function getUpdatedAtAttribute($val)
    {
    return \Carbon\Carbon::parse($val)->format('d/m/y');
    }
   
    public function tasks()
    {
	return $this->hasMany(Task::Class,'project_id');
    }
   public function getTotalPercentage()
    {
        $finish = $this->tasks()->where('status','finish');
        $total = $this->tasks()->count();

        $count_finish = $finish->count();
        if ($total != 0)
        $percentage = ($count_finish / $total ) * 100 ;
        else
            $percentage = 0 ;

        
        return (int)$percentage;
    }

   
}
