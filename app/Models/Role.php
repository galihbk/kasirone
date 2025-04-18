<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['business_id', 'name', 'menu_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
