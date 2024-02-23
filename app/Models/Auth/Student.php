<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'name',
        'course'
    ];

    protected $guarded = [];

    public function subjects()
    {
        return $this->hasMany(Subject::class,'student_id','id');
    }
}
