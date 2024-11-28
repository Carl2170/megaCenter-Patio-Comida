<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Inertia\Inertia;

class UserController extends Controller
{
    public function obtenerInfoUser(){
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
        }

        return response()->json([
            'user' => $user,
            'roles' => $user->getRoleNames(),
        ]);
    }

    public function redireccionarDashboard(){
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            $roles = $user->getRoleNames();

            if($user->roles->contains('name', 'admin')){
                return Inertia::render('Admin/AdminDashboard');
            }
            // if ($roles->contains('admin')) {
            //     return Inertia::render('Admin/AdminDashboard');
            // }
            if ($user->roles->contains('name', 'cliente')) {
                return Inertia::render('Cliente/ClienteDashboard');
            }

            if ($user->roles->contains('name', 'locatario')) {
                return Inertia::render('Locatario/LocatarioDashboard');
            }
        }
    }
}
