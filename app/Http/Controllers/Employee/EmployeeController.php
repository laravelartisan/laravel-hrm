<?php

namespace Erp\Http\Controllers\Employee;

use Illuminate\Http\Request;

use Erp\Http\Requests;
use Erp\Http\Controllers\Controller;
use Illuminate\Auth\Guard;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'/*,['only'=>['employeePage']]*/);
    }

    /**
     * @return string
     */
    public function employeePage()
    {
        return 'I m an employee';
    }
}
