<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Pengabdian;
use Illuminate\Auth\Access\HandlesAuthorization;

class PengabdianPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_pengabdian');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Pengabdian $pengabdian): bool
    {
        return $user->can('view_pengabdian');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_pengabdian');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Pengabdian $pengabdian): bool
    {
        return $user->can('update_pengabdian');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Pengabdian $pengabdian): bool
    {
        return $user->can('delete_pengabdian');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_pengabdian');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Pengabdian $pengabdian): bool
    {
        return $user->can('force_delete_pengabdian');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_pengabdian');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Pengabdian $pengabdian): bool
    {
        return $user->can('restore_pengabdian');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_pengabdian');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Pengabdian  $pengabdian
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Pengabdian $pengabdian): bool
    {
        return $user->can('replicate_pengabdian');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_pengabdian');
    }

}
