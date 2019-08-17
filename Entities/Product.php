<?php namespace VaahCms\Modules\Orders\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebReinvent\VaahCms\Entities\User;

class Product extends Model {

    use SoftDeletes;

    //-------------------------------------------------
    protected $table = 'vh_ord_products';
    //-------------------------------------------------
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
    //-------------------------------------------------
    protected $dateFormat = 'Y-m-d H:i:s';
    //-------------------------------------------------

    protected $fillable = [
        'vh_ord_order_id', 'productable_id', 'productable_type',
        'sku', 'name', 'details',
        'price', 'quantity', 'total',
        'image', 'status', 'shipping_method',
        'tracking_number', 'tracking_url',
        'created_by', 'updated_by', 'deleted_by',
    ];

    //-------------------------------------------------

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
    public static function validateMultipleProduct($products)
    {
        $rules = array(
            '*.name' => 'required',
            '*.details' => 'required',
            '*.price' => 'required',
            '*.quantity' => 'required',
            '*.total' => 'required',
        );

        $validator = \Validator::make( $products, $rules);
        if ( $validator->fails() ) {
            $errors             = errorsToArray($validator->errors());
            $response['status'] = 'failed';
            $response['errors'] = $errors;
            return $response;
        }
        $response['status'] = 'success';
        return $response;

    }
    //-------------------------------------------------
    //-------------------------------------------------
    //-------------------------------------------------
    //-------------------------------------------------
    //-------------------------------------------------

}
