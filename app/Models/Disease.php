<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'value', 'description', 'advice'];

    protected $hidden = ['created_at', 'updated_at'];

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class)->withPivot(['value']);
    }

    public function diagnoses()
    {
        return $this->hasMany(Diagnose::class);
    }
}
