<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //--> Creating role and permission <--//
        //Role::create(['name' => 'writer']);
        //Permission::create(['name' => 'write post']);

        //--> A role can be given permission to a permission  <--//
        // $permission = Permission::create(['name' => 'edit post']);
        // $role = Role::findById(1);
        // $role->givePermissionTo($permission);

        //--> A permission can be assigned to a role  <--//
        // $permission = Permission::findById(1);
        // $role = Role::findById(1);
        // $permission->assignRole($role);

        //--> A permission can be removed from a role <--//
        // $role = Role::findById(1);
        // $permission = Permission::findById(2);
        // $role->revokePermissionTo($permission);

        //auth()->user()->givePermissionTO('edit post'); //-> assigning permission to loggend in user 

        //auth()->user()->assignRole('writer'); //-> assigning role to loggend in user 

        // return auth()->user()->permissions;   //-> get permissions assigned to model

        // return auth()->user()->getDirectPermissions();   //-> get permissions assigned to model similar as above

        // return auth()->user()->getPermissionsViaRoles(); //get all permissions assigned to role which role is assigned to model

        // return auth()->user()->getAllPermissions();   //-> get all permissions assigned to model and role

        //return User::permission('edit post')->get();  // Returns only users with the permission 'edit post' (inherited or directly)
        //return User::permission('write post')->get();  // Returns only users with the permission 'write post' (inherited or directly)

        //return User::with('roles')->get();

        return view('home');
    }
}
