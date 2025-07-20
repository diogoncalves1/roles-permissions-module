<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Repositories\PermissionRepository;

class PermissionsController extends AppController
{
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    public function index()
    {
        $this->allowedAction('viewPermissions');

        $permissions = $this->permissionRepository->all();

        return view('admin.permissions.index', ["permissions" => $permissions]);
    }

    public function create()
    {
        //
    }

    public function store(PermissionRequest $request)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(PermissionRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}