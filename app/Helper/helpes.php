<?php


// link ativo na barra lateral no admin
function ativadorLinks(array $route){

    if(is_array($route)){
        foreach($route as $ms){
            if(request()->routeIs($ms)){
                return 'active';

            }
        }
    }
}
