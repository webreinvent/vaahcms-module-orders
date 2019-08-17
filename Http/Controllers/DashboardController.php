<?php namespace VaahCms\Modules\Orders\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{

    public $data;

    public function __construct()
    {
        $this->data = new \stdClass();
    }

    public function index()
    {
        $this->data->title = "Orders Dashboard";
        return view('orders::admin.pages.app')->with('data', $this->data);
    }

}