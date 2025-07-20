<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repositories\RoleRepository;

class RoleController extends AppController
{
    private $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $this->allowedAction('viewRoles');

        $roles = $this->repository->all();

        return view('roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        $this->allowedAction('addRole');

        return view('roles.form');
    }

    public function store(RoleRequest $request)
    {
        $this->allowedAction('addRole');

        $this->repository->store($request);

        redirect(route('admin.roles.index'));
    }

    public function edit(string $id)
    {
        $this->allowedAction('editRole');

        $role = $this->repository->show($id);

        return view('roles.create', ["role" => $role]);
    }

    public function update(RoleRequest $request, string $id)
    {
        $this->allowedAction('editRole');

        $this->repository->update($request, $id);

        redirect(route('admin.roles.index'));
    }

    public function destroy(string $id)
    {
        $this->allowedAction('destroyRole');

        $this->repository->destroy($id);

        redirect(route('admin.roles.index'));
    }

    public function showManageForm(string $id) {}

    public function manage(string $id) {}
}