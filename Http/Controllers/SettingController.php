<?php namespace VaahCms\Modules\Orders\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use WebReinvent\VaahCms\Entities\Module;
use WebReinvent\VaahCms\Entities\Setting;

class SettingController extends Controller
{

    public $module;

    public function __construct()
    {
        $this->module = Module::slug('orders')->first();
    }

    //-------------------------------------------------------------
    public function getTypes(Request $request)
    {

        $data = [];

        $response['status'] = 'success';
        $response['data'] = [
            [
                'name' => "General",
                'slug' => "general",
            ],
            [
                'name' => "Payment Gateways",
                'slug' => "payment_gateways",
            ],
        ];

        return response()->json($response);
    }
    //-------------------------------------------------------------
    public function getGeneralSettings(Request $request)
    {

        $data = [];

        $list[] = $this->module->settings()->key('payment_success_url')->first();
        $list[] = $this->module->settings()->key('payment_failure_url')->first();

        $response['status'] = 'success';
        $response['data']['list'] = $list;

        return response()->json($response);

    }
    //-------------------------------------------------------------
    public function storeGeneralSettings(Request $request)
    {

        $data = [];
        $inputs = $request->all();

        foreach ($inputs as $item)
        {
            $setting = Setting::find($item['id']);
            $setting->fill($item);
            $setting->save();
        }

        $response['status'] = 'success';
        $response['messages'][] = 'Settings Saved';
        $response['data'] = $data;

        return response()->json($response);

    }
    //-------------------------------------------------------------

    public function getPaymentGateways()
    {

        $settings = $this->module->settings()->where('key', 'payment_gateways')->first();
        $settings->value = json_decode($settings->value);

        $response['status'] = 'success';
        $response['data'] = $settings;
        return response()->json($response);
    }

    //-------------------------------------------------------------
    public function storePaymentGateways(Request $request)
    {
        $rules = array(
            'id' => 'required',
        );

        $validator = \Validator::make( $request->all(), $rules);
        if ( $validator->fails() ) {

            $errors             = errorsToArray($validator->errors());
            $response['status'] = 'failed';
            $response['errors'] = $errors;
            return response()->json($response);
        }

        $setting = Setting::find($request->id);
        $setting->fill($request->all());
        $setting->value = json_encode($request->value);
        $setting->save();

        $response['status'] = 'success';
        $response['messages'][] = 'Settings Saved';
        $response['data'] = $setting;

        return response()->json($response);

    }
    //-------------------------------------------------------------
    //-------------------------------------------------------------
    //-------------------------------------------------------------

}