<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Profile extends Model
{

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deleteImage()
    {
        if(Storage::exists('public/' . $this->image)){
            Storage::delete('public/' . $this->image);
        }
    }
}
