<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::group([
    "prefix" => "admin",
    "as" => "admin.",
    "middleware" => ["auth"]
], function () {
    Route::group(
        [
            "prefix" => "roles",
            "as" => "roles."
        ],
        function () {
            Route::get("manage/{id}", [\App\Http\Controllers\RoleController::class, "showManageForm"]);
            Route::post("manage{id}", [\App\Http\Controllers\RoleController::class, "manage"]);
        }
    );
    Route::resource("roles", \App\Http\Controllers\RoleController::class, ['except' => 'show']);
    Route::resource("permissions", \App\Http\Controllers\PermissionsController::class, ['except' => 'show']);
});