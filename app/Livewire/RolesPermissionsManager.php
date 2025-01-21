<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class RolesPermissionsManager extends Component
{
    public $roles, $permissions, $users;
    public $selectedUser;
    public $userRoles = [];
    public $userPermissions = [];

    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
        $this->users = User::with('roles', 'permissions')->get();
    }

    public function updatedSelectedUser($userId)
    {
        if ($userId) {
            $user = User::find($userId);
            $this->userRoles = $user->roles->pluck('name')->toArray();
            $this->userPermissions = $user->permissions->pluck('name')->toArray();
        } else {
            $this->userRoles = [];
            $this->userPermissions = [];
        }
    }

    public function toggleRole($roleName)
    {
        if (!$this->selectedUser) {
            session()->flash('error', 'Selecciona un usuario primero.');
            return;
        }

        $user = User::find($this->selectedUser);

        if ($user->hasRole($roleName)) {
            $user->removeRole($roleName);
            session()->flash('success', "Rol '{$roleName}' revocado.");
        } else {
            $user->assignRole($roleName);
            session()->flash('success', "Rol '{$roleName}' asignado.");
        }

        $this->updatedSelectedUser($this->selectedUser);
        session()->flash('success', 'Rol asignado correctamente.');
$this->dispatch('hideMessages');

    }

    public function togglePermission($permissionName)
    {
        if (!$this->selectedUser) {
            session()->flash('error', 'Selecciona un usuario primero.');
            return;
        }

        $user = User::find($this->selectedUser);

        if ($user->permissions->pluck('name')->contains($permissionName)) {
            $user->revokePermissionTo($permissionName);
            session()->flash('success', "Permiso '{$permissionName}' revocado.");
        } else {
            $user->givePermissionTo($permissionName);
            session()->flash('success', "Permiso '{$permissionName}' asignado.");
        }

        $this->updatedSelectedUser($this->selectedUser);
        session()->flash('success', 'Rol asignado correctamente.');
$this->dispatch('hideMessages');

    }

    public function render()
    {
        return view('livewire.roles-permissions-manager');
    }
}
