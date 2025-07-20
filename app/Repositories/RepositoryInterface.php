<?php

namespace App\Repositories;


class RepositoryInterface
{
    public function all() {}

    public function store() {}

    public function update() {}

    public function destroy(string $id) {}

    public function show(string $id) {}
}