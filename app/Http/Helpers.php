<?php

use App\Models\OnCampusGalleryImages;
use phpDocumentor\Reflection\Types\This;

function loadingState($key, $title)
{
    $loadingSpinner = '
            <div wire:loading wire:target="' . $key . '" wire:key="' . $key . '"><i class="fa fa-spinner fa-spin" style="width: 100%;"></i></div>
            <div wire:loading.remove wire:target="' . $key . '" wire:key="' . $key . '">' . $title . '</div>
        ';

    return $loadingSpinner;
}

function loadingStateWithText($key, $title)
{
    $loadingSpinner = '
            <div wire:loading wire:target="' . $key . '" wire:key="' . $key . '"><i class="fa fa-spinner fa-spin" style="width: 100%;"></i></div> ' . $title . '
        ';

    return $loadingSpinner;
}


function totalImage($id)
{
    $total = OnCampusGalleryImages::where('gallery_id', $id)->get()->count();

    return $total;
}
