<?php

namespace App\Models\HumanResources;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    protected $table = 'job';
    protected $fillable  = ['job_name', 'description', 'rate'];

    public function employee(){
        return $this->hasMany(Job::class);
    }
}
