<?php

use Illuminate\Support\Facades\View;
use PragmaRX\Countries\Package\Countries;

if(!function_exists('theme_path')){
    function theme_path($view, ...$rest){
        $theme = config('view.theme');
        $path = "$theme.$view";

        if(View::exists($path)) return $path;

        return $view;
    }
}

if(!function_exists('theme_asset')){
    function theme_asset($path = ''){
        $theme = config('view.theme');
        $path = trim($path, '/');
        return "/themes/$theme/$path";
    }
}


if(!function_exists('getCountries')){
    function getCountries(){
        return Countries::all()->pluck('name.common');
    }
}
