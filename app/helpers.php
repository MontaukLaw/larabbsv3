<?php
/**
 * Created by PhpStorm.
 * User: Marc LAW: zunly@hotmail.com
 * Date: 2019/1/8
 * Time: 10:44
 */

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}