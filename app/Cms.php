<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $table = 'cms';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['section', 'title', 'slug', 'description', 'image'];
}
