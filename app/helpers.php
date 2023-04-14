<?php
if(!function_exists('theme_path')){
    function theme_path($view, ...$rest){
        $theme = config('view.theme');
        return "$theme.$view";
    }
}

if(!function_exists('theme_asset')){
    function theme_asset($path){
        $theme = config('view.theme');
        $path = trim($path, '/');
        return "/themes/$theme/$path";
    }
}
