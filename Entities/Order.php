<?php namespace VaahCms\Modules\Orders\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use WebReinvent\VaahCms\Entities\User;
use WebReinvent\VaahCms\Traits\CrudWithUuidObservantTrait;


class Order extends Model {

    use SoftDeletes;
    use CrudWithUuidObservantTrait;

    //-------------------------------------------------
    protected $table = 'vh_ord_orders';
    //-------------------------------------------------
    protected $dates = [
        'is_paid_at', 'is_invoiced_at', 'is_shipped_at',
        'is_delivered_at',
        'created_at', 'updated_at', 'deleted_at'
    ];
    //-------------------------------------------------
    protected $dateFormat = 'Y-m-d H:i:s';
    //-------------------------------------------------

    protected $fillable = [
        'uuid', 'user_id', 'parent_vh_ord_order_id',
        'order_number', 'order_date', 'status',
        'reorder_vh_ord_order_id', 'order_payment_status', 'is_paid_at',
        'is_invoiced_at', 'is_shipped_at', 'is_delivered_at',
        'currency', 'sub_total', 'coupon_code',
        'coupon_discounted_value', 'discount', 'tax',
        'total', 'paid', 'balance',
        'staff_notes', 'customer_notes', 'header_text',
        'footer_text', 'meta',
        'created_by', 'updated_by', 'deleted_by',
    ];

    public function scopeCreatedBy($query, $user_id)
    {
        return $query->where('created_by', $user_id);
    }
    //-------------------------------------------------
    public function scopeUpdatedBy($query, $user_id)
    {
        return $query->where('updated_by', $user_id);
    }
    //-------------------------------------------------
    public function scopeDeletedBy($query, $user_id)
    {
        return $query->where('deleted_by', $user_id);
    }
    //-------------------------------------------------
    public function createdBy() {
        return $this->belongsTo( User::class, 'created_by', 'id');
    }
    //-------------------------------------------------
    public function updatedBy() {
        return $this->belongsTo( User::class, 'updated_by', 'id');
    }
    //-------------------------------------------------
    public function deletedBy() {
        return $this->belongsTo( User::class, 'deleted_by', 'id');
    }
    //-------------------------------------------------
    public static function validateOrder($request)
    {
        $rules = array(
            'user_id' => 'required',
            'order_number' => 'required',
            'order_date' => 'required|date',
            'currency' => 'required',
            'sub_total' => 'required|numeric',
            'total' => 'required|numeric',
        );

        $messages = [
            'user_id.required' => "Choose customer"
        ];

        $validator = \Validator::make( $request->all(), $rules, $messages);
        if ( $validator->fails() ) {
            $errors             = errorsToArray($validator->errors());
            $response['status'] = 'failed';
            $response['errors'] = $errors;
            return $response;
        }

        //custom validations
        $exist = Order::where('order_number', $request->order_number)->first();

        if($exist)
        {
            $response['status'] = 'failed';
            $response['errors'][] = 'Order number already exist';
            return $response;
        }

        if(count($request->products) < 1)
        {
            $response['status'] = 'failed';
            $response['errors'][] = 'At least one product is required to place an order.';
            return $response;
        }

        $response['status'] = 'success';
        return $response;

    }
    //-------------------------------------------------
    public static function storeOrder($request)
    {

        try{

            $inputs = $request->all();

            if($request->has('id'))
            {
                $order = Order::find($request->id);
            } else{
                $order = new Order();
                $order->status = 'draft';
                $order->order_payment_status = 'pending';
                $order->uuid = Str::uuid();
                $order->paid = 0;
                $order->balance = 0;

                if($inputs['total'] == 0)
                {
                    $order->status = 'completed';
                    $order->order_payment_status = 'not-applicable';
                    $order->is_paid = \Carbon::now();
                }
            }
            $order->fill($request->except(['order_date']));
            $order->order_date = \Carbon::parse($request->order_date)->format('Y-m-d');
            $order->save();

            $response['status'] = 'success';

        }catch(\Exception $e)
        {
            $response['status'] = 'failed';
            $response['errors'][] = $e->getMessage();

        }
        return $response;

    }
    //-------------------------------------------------
    //-------------------------------------------------
    //-------------------------------------------------
    //-------------------------------------------------
    //-------------------------------------------------

}
