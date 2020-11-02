<?php

namespace App\Models;

use App\Models\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "value",
        "person_id"
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
