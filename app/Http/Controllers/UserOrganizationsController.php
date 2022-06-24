<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserOrganization;

class UserOrganizationsController extends BaseController
{
    private $table;
    function __construct()
    {
        $this->table = new UserOrganization();
    }
}
