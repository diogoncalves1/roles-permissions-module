<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory;

    protected $fillable = ["name", "code"];

    public function users()
    {
        $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        $this->belongsToMany(Permissions::class);
    }

    public function proles()
    {
        $this->hasMany(PermissionRole::class);
    }
}