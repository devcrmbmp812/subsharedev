<?php
if(! function_exists('active_menu')){
    function active_menu($requestName ){
        dd( substr(\Route::getCurrentRouteName()->getName(),1,8) );
        if(substr(\Route::getCurrentRouteName()->getName(),1,8) == $requestName){
            return 'active';
        }else{
            return null;
        }
    }
}

function dateFormat($date){
    return \Carbon\Carbon::parse($date)->format('d.m.Y');
}

function dateHumans($date){
    return \Carbon\Carbon::parse($date)->diffForHumans();
}
?>