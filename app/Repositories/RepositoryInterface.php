<?php

namespace App\Repositories;

use App\Http\Requests\PermissionRequest;
use App\Models\Permissions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RepositoryInterface
{
    public function all()
    {
        Permissions::all();
    }

    public function store(PermissionRequest $request)
    {
        try {
            $input = $request->all();
            DB::transaction(function () use ($input) {
                Permissions::create($input);
            });
        } catch (\Exception $e) {
            Log::error($e);
        }
    }

    public function update(PermissionRequest $request, string $id) {}

    public function destroy(string $id) {}

    public function show(string $id) {}
}