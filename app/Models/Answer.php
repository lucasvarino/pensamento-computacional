<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function answersClasses()
    {
        return $this->hasMany(AnswerClass::class);
    }

    public function bartleResults()
    {
        return $this->hasMany(BartleResult::class);
    }

    public function hexadAnswers()
    {
        return $this->hasMany(HexadAnswer::class);
    }

    public function hexadResults()
    {
        return $this->hasMany(HexadResult::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }

    public function getTestClassNameAttribute()
    {
        if ($this->relationLoaded('answersClasses') && $this->answersClasses->isNotEmpty()) {
            return optional($this->answersClasses->first()->classe)->name;
        }
        
        if ($this->relationLoaded('hexadAnswers') && $this->hexadAnswers->isNotEmpty()) {
            return optional($this->hexadAnswers->first()->classe)->name;
        }
        
        return null;
    }
}
