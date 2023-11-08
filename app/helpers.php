<?php

function setActive($path){
    return request()->routeIs($path);
}
