<?php

namespace App\Repositories;

use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
                $role = Role::create($input);

                Log::info('Role ' . $role->id . ' added.');
                Session::flash('success', 'Perfil adicionado com sucesso!');
            });
        } catch (\Exception $e) {
            Log::error($e);
            Session::flash('error', 'Erro ao tentar adicionar perfil.');
        }
    }

    public function update(RoleRequest $request, string $id)
    {
        try {
            $input = $request->all();
            $role = $this->show($id);

            DB::transaction(function () use ($input, $role) {
                $role->update($input);

                Log::info('Role ' . $role->id . ' updated');
                Session::flash('success', 'Perfil atualizado com sucesso!');
            });
        } catch (\Exception $e) {
            Log::error($e);
            Session::flash('error', 'Erro ao tentar atualizar perfil.');
        }
    }

    public function destroy(string $id)
    {
        try {
            DB::transaction(function () use ($id) {
                $role = $this->show($id);
                if ($role->users->count() > 0) {
                    Session::flash('warning', 'Existem Utilizadores com esse perfil, verifique de alterar o perfil desses utilizadores.');
                    return;
                }

                $role->delete();

                Log::info('Role ' . $role->id . ' deleted');
                Session::flash('success', 'Perfil apagado com sucesso!');
            });
        } catch (\Exception $e) {
            Log::error($e);
            Session::flash('error', 'Erro ao tentar apagar esse perfil.');
        }
    }

    public function show(string $id)
    {
        return Role::find($id);
    }
}