<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'grade_id'
    ];

     public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
