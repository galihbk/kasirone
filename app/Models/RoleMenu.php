<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleMenu extends Model
{
    protected $table = 'role_menu';
    protected $fillable = ['role_id', 'menu_id', 'can_access'];
    public function Menu()
    {
        return $this->hasMany(Menu::class);
    }
}
