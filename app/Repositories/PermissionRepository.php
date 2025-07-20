<?php

namespace App\Repositories;

use App\Http\Requests\PermissionRequest;
use App\Models\Permissions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PermissionRepository implements RepositoryInterface
{
    public function all()
    {
        return Permissions::all();
    }

    public function store(PermissionRequest $request)
    {
        try {
            $input = $request->all();

            DB::transaction(function () use ($input) {
                $permission = Permissions::create($input);

                Log::info('Permission ' . $permission->id . ' added');
                Session::flash('success', 'Permissão adicionada com sucesso!');
            });
        } catch (\Exception $e) {
            Log::error($e);
            Session::flash('error', 'Erro ao adicionar permissão.');
        }
    }

    public function update(PermissionRequest $request, string $id)
    {
        try {
            $input = $request->all();

            DB::transaction(function () use ($input, $id) {
                $permission = Permissions::find($id);
                $permission->update($input);

                Log::info('Permission ' . $permission->id . ' updated.');
                Session::flash('success', 'Permissão atualizada com sucesso!');
            });
        } catch (\Exception $e) {
            Log::error($e);
            Session::flash('error', 'Erro ao tentar atualizar permissão.');
        }
    }

    public function destroy(string $id)
    {
        try {
            DB::transaction(function () use ($id) {
                $permission = Permissions::find($id);
                $permission->delete();

                Log::info('Permission ' . $permission->id . ' destroyed.');
                Session::flash('success', 'Permissão apagada com sucesso!');
            });
        } catch (\Exception $e) {
            Log::error($e);
            Session::flash('error', 'Erro ao tentar apagar permissão.');
        }
    }

    public function show(string $id)
    {
        return Permissions::find($id);
    }
}