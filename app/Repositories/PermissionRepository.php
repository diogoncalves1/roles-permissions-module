<?php

namespace App\Repositories;

use App\Models\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PermissionRepository implements RepositoryInterface
{
    public function all()
    {
        return Permissions::all();
    }

    public function store(Request $request)
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

    public function update(Request $request, string $id)
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

    public function dataTable(Request $request)
    {
        $query = Permissions::query();

        $userLang = $_COOKIE["lang"];

        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $userLang = $_COOKIE["lang"];
                $q->where("name", 'like', "{$search}%")
                    ->orWhere("category", 'like', "{$search}%")
                    ->orWhere("code", 'like', "{$search}%");
            });
        }

        $orderColumnIndex = $request->input('order.0.column');
        $orderColumn = $request->input("columns.$orderColumnIndex.data");
        $orderDir = $request->input('order.0.dir');
        if ($orderColumn && $orderDir) {
            $query->orderBy($orderColumn, $orderDir);
        }

        $total = $query->count();

        $permissions = $query->offset($request->start)
            ->limit($request->length)
            ->select("name", "category", 'id', 'code',)
            ->get();

        foreach ($permissions as &$permission) {
            $permission->actions = "<div class='btn-group'>
                            <a type='button' href='" . route('admin.permissions.edit', $permission->id) . "' class='btn btn-default'>
                                <i class='fas fa-edit'></i>
                            </a>
                            <button type='button' onclick='modalDelete({$permission->id})' class='btn btn-default'>
                                <i class='fas fa-trash'></i>
                            </button>
                        </div>";
        }

        $data = [
            'draw' => intval($request->draw),
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $permissions
        ];

        return $data;
    }
}
