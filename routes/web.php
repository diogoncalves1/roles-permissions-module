<?php

use Illuminate\Support\Facades\Route;

Route::group([
    "prefix" => "admin",
    "as" => "admin.",
    // "middleware" => ["auth"]
], function () {
    Route::group(
        [
            "prefix" => "roles",
            "as" => "roles."
        ],
        function () {
            Route::get("manage/{id}", [\App\Http\Controllers\RoleController::class, "showManageForm"])->name('manage');
            Route::post("manage/{id}", [\App\Http\Controllers\RoleController::class, "manage"])->name('manage.update');
        }
    );
    Route::get('roles/data',  [\App\Http\Controllers\RoleController::class, 'dataTable']);
    Route::resource("roles", \App\Http\Controllers\RoleController::class, ['except' => 'show']);
    Route::get('permissions/data', [\App\Http\Controllers\PermissionsController::class, 'dataTable']);
    Route::resource("permissions", \App\Http\Controllers\PermissionsController::class, ['except' => 'show']);
});
