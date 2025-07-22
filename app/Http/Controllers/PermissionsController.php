<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Repositories\PermissionRepository;
use Illuminate\Http\Request;

class PermissionsController extends AppController
{
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        // $this->allowedAction('viewPermissions');


        return view('admin.permissions.index');
    }

    public function create()
    {
        // $this->allowedAction('addPermission');

        return view('admin.permissions.form');
    }

    public function store(PermissionRequest $request)
    {
        // $this->allowedAction('addPermission');

        $this->permissionRepository->store($request);

        return redirect()->route('admin.permissions.index');
    }

    public function edit(string $id)
    {
        // $this->allowedAction('editPermission');

        $permission = $this->permissionRepository->show($id);

        return view('admin.permissions.form', ['permission' => $permission]);
    }

    public function update(PermissionRequest $request, string $id)
    {
        // $this->allowedAction('editPermission');

        $this->permissionRepository->update($request, $id);

        return redirect()->route('admin.permissions.index');
    }

    public function destroy(string $id)
    {
        // $this->allowedAction('destroyPermission');

        $this->permissionRepository->destroy($id);

        return redirect()->route('admin.permissions.index');
    }
    public function dataTable(Request $request)
    {
        $data = $this->permissionRepository->dataTable($request);

        return response()->json($data);
    }
}
