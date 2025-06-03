<?php

namespace App\Observers;

use App\Masina;
use Illuminate\Support\Facades\File;

class MasinaObserver
{
    /**
     * Handle the User "deleting" event.
     *
     * @param  \App\Masina  $masina
     * @return void
     */
    public function deleting(Masina  $masina)
    {
        File::delete(storage_path("/app/public/{$masina->picture}"));
        
        $masina->mtags()->detach();
    }

    /**
     * Handle the User "updating" event.
     *
     * @param  \App\Masina  $masina
     * @return void
     */
    public function updating(Masina $masina)
    {
        if ($masina->picture != $masina->getOriginal('picture')) {
            File::delete(storage_path("/app/public/{$masina->getOriginal('picture')}"));
        }
    }
}
