<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnose extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'disease_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class)->withPivot(['value']);
    }
}
