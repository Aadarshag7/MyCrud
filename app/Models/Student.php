<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'dob',
        'section_id',
        'photo',
        'grade_id'
    ];
    
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
