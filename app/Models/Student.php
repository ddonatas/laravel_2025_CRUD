<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
    

class Student extends Model
{
    use HasFactory;
    use SoftDeletes; // Naudojame SoftDeletes trait
    protected $fillable = ['name', 'surname', 'address', 'phone', 'city_id'];
    protected $dates = ['deleted_at']; // Nurodome, kad tai data

    // Susiejimas su miestu
    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
