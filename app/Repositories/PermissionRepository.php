<?php

namespace App\Repositories;

use App\Models\Permissions;

class PermissionRepository implements RepositoryInterface
{
    public function all()
    {
        return Permissions::all();
    }

    public function store() {}

    public function update() {}
    public function destroy() {}
    public function show() {}
}