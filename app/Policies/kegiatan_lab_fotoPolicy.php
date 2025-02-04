<?php

namespace App\Policies;

use App\Models\User;
use App\Models\kegiatan_lab_foto;
use Illuminate\Auth\Access\HandlesAuthorization;

class kegiatan_lab_fotoPolicy
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
        return $user->can('view_any_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\kegiatan_lab_foto  $kegiatanLabFoto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, kegiatan_lab_foto $kegiatanLabFoto): bool
    {
        return $user->can('view_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\kegiatan_lab_foto  $kegiatanLabFoto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, kegiatan_lab_foto $kegiatanLabFoto): bool
    {
        return $user->can('update_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\kegiatan_lab_foto  $kegiatanLabFoto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, kegiatan_lab_foto $kegiatanLabFoto): bool
    {
        return $user->can('delete_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\kegiatan_lab_foto  $kegiatanLabFoto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, kegiatan_lab_foto $kegiatanLabFoto): bool
    {
        return $user->can('force_delete_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\kegiatan_lab_foto  $kegiatanLabFoto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, kegiatan_lab_foto $kegiatanLabFoto): bool
    {
        return $user->can('restore_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\kegiatan_lab_foto  $kegiatanLabFoto
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, kegiatan_lab_foto $kegiatanLabFoto): bool
    {
        return $user->can('replicate_kegiatan::lab::foto');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_kegiatan::lab::foto');
    }

}
