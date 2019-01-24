<?php
/**
 * Created by PhpStorm.
 * User: Marc LAW: zunly@hotmail.com
 * Date: 2019/1/24
 * Time: 11:13
 */

namespace App\Models;


class Property
{
    public $roles;

    public function __construct($roles)
    {
        $this->roles = $roles;
    }

    public function roles()
    {
        return 1;
    }
}