@extends('layouts.admin')

@section('title', ' Permissões ')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Permissões</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Permissões</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- @can('authorization', 'viewConstruction') --}}
                        <a href="{{ route('admin.permissions.create') }}" class="btn btn-default">Adicionar
                            Permissão</a>
                        {{-- @endcan --}}
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->code }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->category }}</td>
                                    <td>
                                        @can('authorization', 'editPermission')
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ route('admin.permissions.edit', $permission->id) }}">Editar</a>
                                        @endcan
                                        @can('authorization', 'deletePermission')
                                        <button class="btn btn-danger btn-sm btnDelete"
                                            data-id="{{ $permission->id }}">Excluir</button>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="../assets/js/allIndex.js"></script>
<script src="../assets/admin/js/super-admin/permissions/index.js"></script>

@endsection