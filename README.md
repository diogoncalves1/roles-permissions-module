<p align="center"> 
    <a href="https://laravel.com" target="_blank"> 
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"> 
    </a> 
</p> 
<p align="center"> 
    <strong>Modular Role & Permission System for Laravel</strong>
    <br> 
    A clean and flexible authorization structure using roles and permissions for admin-based applications. 
</p>
📘 Project Overview

This project implements a modular Roles and Permissions system in Laravel, allowing administrators to assign specific roles to users, each with a defined set of permissions.

A role can have multiple permissions.
A user can be assigned one or more roles, and inherit the associated permissions.
Intended for use in admin panels or applications where access control is required for specific actions or modules.
🔐 Use Case Examples

Role	Permissions
Admin	Create, edit, delete users, manage roles & system
Editor	Edit content, manage own articles
Viewer	View dashboards and reports only

⚙️ Features

Fully modular architecture using nwidart/laravel-modules

CRUD operations for:
Roles
Permissions
Role-permission relationship management
Form validation and user feedback

Middleware-ready for route protection

📦 Installation

Clone the repository or add the module to your Laravel app.

Install dependencies:
composer install

Run migrations:
php artisan migrate


(Optional) Seed default roles and permissions:
php artisan db:seed

📄 License

This project is open-sourced under the MIT license.

📌 Customization & Extension

You are free to adapt and extend this module to fit your application's needs, including:
