<?php

namespace App\Listeners;

use App\Events\SeriesDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClearFilesAboutSeriesDeleted //síncrono
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SeriesDeleted $event)
    {
        $file_path = './storage/' . $event->seriesCover;

        if (file_exists($file_path)) {
            unlink($file_path);
        } else {
            return to_route('series.index')->with("danger", "A Série não possue arquivo de imagem existente.");
        }
    }
}
