<?php namespace VaahCms\Modules\Orders\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{


    public function __construct()
    {

    }

    public function index()
    {
        return view('orders::admin.pages.app');
    }

}