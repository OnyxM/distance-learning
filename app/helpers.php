<?php


use Illuminate\Support\Facades\App;

if (! function_exists('activeLiApp')) {
    function activeLiApp($prefix, $availableURL) {

        $urlPage = $_SERVER['REQUEST_URI']; // je récupère la page sur laquelle je me trouve ...
        $urlPage = explode("/".App::getLocale(), $urlPage); $urlPage = end($urlPage);

        $parts = explode("/$prefix", $urlPage);

        $active = $parts[1];

        foreach ($availableURL as $item) {
            return (strstr("$active", $item)) ? " active" : null;
        }
    }
}
