<?php


use Illuminate\Support\Facades\App;

if (! function_exists('activeLiApp')) {
    function activeLiApp($prefix, $availableURL) {

        $urlPage = $_SERVER['REQUEST_URI']; // je récupère la page sur laquelle je me trouve ...
        $urlPage = explode("/".App::getLocale(), $urlPage); $urlPage = end($urlPage);

        $parts = explode("/$prefix", $urlPage);

        $active = @$parts[1];

        if(empty($availableURL) && $active==""){
            return " active";
        }
        else{
            foreach ($availableURL as $item) {
                return ($active==$item || strstr($active, $item)) ? " active" : null;
            }
        }
    }
}

if (! function_exists('getStudentLives')) {
    function getStudentLives($user = null) {

        $user = $user ?? \Illuminate\Support\Facades\Auth::user();

        $lives = [];

        foreach ($user->classes as $class) {
            foreach ($class->semesters as $semester) {
                foreach ($semester->ues as $ue) {
                    foreach ($ue->lives as $live) {
                        $lives[] = $live;
                    }
                }
            }
        }

        return $lives;
    }
}
