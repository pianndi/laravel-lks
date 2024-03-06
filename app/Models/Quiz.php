<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    public function answer (){
        return $this->hasMany(Attempt::class);
    }
    public function question (){
        return $this->hasMany(Question::class);
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
