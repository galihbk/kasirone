<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['menu_name', 'url', 'status', 'icon', 'parent_id', 'order'];

    public function roleMenu()
    {
        return $this->belongsTo(RoleMenu::class);
    }
}
