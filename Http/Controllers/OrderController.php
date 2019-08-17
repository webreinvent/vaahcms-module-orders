<?php namespace VaahCms\Modules\Orders\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use VaahCms\Modules\Orders\Entities\Address;
use VaahCms\Modules\Orders\Entities\Order;
use WebReinvent\VaahCms\Entities\User;

class OrderController extends Controller {


    //-------------------------------------------------------------
	public function index()
	{
        return view('index');
	}
    //-------------------------------------------------------------
    public function assets(Request $request)
    {

        $data = [];

        $data['users'] = User::select('id','email','first_name', 'last_name', 'phone')
            ->get();

        $data['countries'] = vh_get_country_list();
        $data['currencies'] = vh_get_currency_list();

        $response['status'] = 'success';
        $response['data'] = $data;

        return response()->json($response);

    }
    //-------------------------------------------------------------
    public function storeCustomer(Request $request)
    {
        $response = User::store($request);
        return response()->json($response);
    }
    //-------------------------------------------------------------
    public function store(Request $request)
    {

        $rules = array(
            'addresses' => 'required',
            'products' => 'required',
        );

        $validator = \Validator::make( $request->toArray(), $rules);
        if ( $validator->fails() ) {

            $errors             = errorsToArray($validator->errors());
            $response['status'] = 'failed';
            $response['errors'] = $errors;
            return response()->json($response);
        }

        //validate order details
        $response = Order::validateOrder($request);
        if(isset($response['status']) && $response['status'] == 'failed')
        {
            return response()->json($response);
        }

        $addresses = $request->addresses;
        unset($addresses['customer_as_billing']);
        unset($addresses['customer_as_shipping']);

        //validate address details
        $response = Address::validateMultipleAddress($addresses);
        if(isset($response['status']) && $response['status'] == 'failed')
        {
            return response()->json($response);
        }

        //validate products
        $response = Address::validateMultipleAddress($request->products);
        if(isset($response['status']) && $response['status'] == 'failed')
        {
            return response()->json($response);
        }


        $data = [];
        $inputs = $request->all();

        //store order
        $response = Order::storeOrder($request);
        if(isset($response['status']) && $response['status'] == 'failed')
        {
            return response()->json($response);
        }

        //store address



        //store products

        $response['status'] = 'failed';
        $response['errors'][] = 'error';

        $response['status'] = 'success';
        $response['messages'][] = 'Saved';
        $response['data'] = $data;

        return response()->json($response);

    }
    //-------------------------------------------------------------
    //-------------------------------------------------------------



}
