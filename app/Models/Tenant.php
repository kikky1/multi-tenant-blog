<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        $this->hasMany(User::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
