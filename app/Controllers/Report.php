<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\CategoryModel;

class Report extends BaseController{
    public function index(){
        return view('report/index');
    }
}
