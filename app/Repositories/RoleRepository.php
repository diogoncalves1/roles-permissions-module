<?php

namespace App\Repositories;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleRepository implements RepositoryInterface
{
    public function all()
    {
        return Role::all();
    }

    public function store(RoleRequest $request)
    {
        try {
            $input = $request->all();
            DB::transaction(function () use ($input) {
                Role::create($input);
            });
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function update(RoleRequest $request, string $id)
    {
        try {
            $input = $request->all();
            $role = Role::find($id);
            DB::transaction(function () use ($input, $role) {
                $role->update($input);
            });
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function destroy(string $id)
    {
        $role = Role::find($id);

        try {
            $role->delete();
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function show(string $id)
    {
        return Role::find($id);
    }
}