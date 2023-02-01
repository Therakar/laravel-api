<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded= ['slug'];
    protected $appends= ['image_url'];

    protected function getImageUrlAttribute(){ 

        return $this->cover_image ? asset("storage/$this->cover_image"): "https://via.placeholder.com/1920x1080";

    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
