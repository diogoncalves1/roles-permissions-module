@extends('layouts.admin')

@section('title', 'CashManager | Adicionar Permissão ')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Adicionar Permissão</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                    <li class="breadcrumb-item active">Adicionar Permissão</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <form action="{{ route('admin.permissions.store') }}" method="POST">
        @csrf
        @if(isset($permission))
        @method('PUT')
        @else
        @method('POST')
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Geral</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputCode">Código <span class="text-danger">*</span></label>
                            <input type="text" name="code" class="validate form-control" required>
                            <span class="error invalid-feedback" id="errorFeedbackCode">Preencha este campo</span>
                            <span class="success valid-feedback">Campo preenchido</span>
                        </div>

                        <div class="form-group">
                            <label for="inputDisplayName">Nome <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="validate form-control" required>
                            <span class="error invalid-feedback">Preencha este
                                campo</span>
                            <span class="success valid-feedback">Campo preenchido</span>
                        </div>

                        <div class="form-group">
                            <label for="inputDisplayName">Categoria <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="validate form-control" required>
                            <span class="error invalid-feedback">Preencha este
                                campo</span>
                            <span class="success valid-feedback">Campo preenchido</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class=" row">
            <div class="col-12">
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" id="btnSubmit" class="btn btn-success float-right">Adicionar Permissão</button>
            </div>
        </div>
    </form>
</section>

<script src="../../assets/js/allCreate.js"></script>
<script src="../../assets/admin/js/super-admin/permissions/create.js"></script>

@endsection