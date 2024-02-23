<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $fillable = [
        'student_id',
        'code',
        'title'
    ];

    protected $guarded = [];

    public function students()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
