<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageList extends Model
{
    protected $table = 'package_list';
    protected $fillable = [
        'description',
        'in_list',
    ];
    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }
}
