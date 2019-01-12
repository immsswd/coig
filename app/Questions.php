<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    public function user()
    {
    	protected $fillable = ['title', 'body'];
    	return $this->belongsTo(User::class);
    }

    // create a mutators
    public function setTitleAttribute($value)
    {
    	$this->attributes['title'] = $value;
    	$this->attributes['slug'] = str_slug($value);
    }
}
