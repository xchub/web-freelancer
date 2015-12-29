<?php

namespace App\Tools;

use Auth;

class Permissions
{
    private function getCurrentUserId()
    {
        return Auth::user()->id;
    }

    public function isAdmin($data = [])
    {
        return $this->getCurrentUserId() == 1 ? true : false;
    }
}
