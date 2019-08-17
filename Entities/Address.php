<?php namespace VaahCms\Modules\Orders\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebReinvent\VaahCms\Entities\User;
use WebReinvent\VaahCms\Traits\CrudObservantTrait;

class Address extends Model {

    use SoftDeletes;
    use CrudObservantTrait;

    //-------------------------------------------------
    protected $table = 'vh_ord_addresses';
    //-------------------------------------------------
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
    //-------------------------------------------------
    protected $dateFormat = 'Y-m-d H:i:s';
    //-------------------------------------------------

    protected $fillable = [
        'user_id', 'type', 'business_name', 'name',
        'phone', 'phone', 'address_one', 'address_two',
        'city', 'state', 'country_code', 'country',
        'postal_code', 'taxation_label', 'taxation_number', 'business_identification_label',
        'business_identification_number', 'meta',
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
    public static function storeAddress($inputs)
    {
        $rules = array(
            'user_id' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'state' => 'required',
            'country_code' => 'required',
            'postal_code' => 'required',
        );

        $validator = \Validator::make( $inputs, $rules);
        if ( $validator->fails() ) {

            $errors             = errorsToArray($validator->errors());
            $response['status'] = 'failed';
            $response['errors'] = $errors;
            return $response;
        }

        try{
            if(isset($inputs['id']) && !empty($inputs['id']))
            {
                $address = Address::find($inputs['id']);
            } else{
                $address = new Address();
            }
            $address->fill($inputs);
            $address->save();

            $response['status'] = 'success';

        }catch(\Exception $e)
        {
            $response['status'] = 'failed';
            $response['errors'][] = $e->getMessage();
        }
        return $response;

    }
    //-------------------------------------------------
    public static function validateMultipleAddress($addresses)
    {


        echo "<pre>";
        print_r($addresses);
        echo "</pre>";
        die("<hr/>line number=123");

        $rules = array(
            '*.user_id' => 'required',
            '*.name' => 'required',
            '*.phone' => 'required',
            '*.email' => 'required',
            '*.state' => 'required',
            '*.country_code' => 'required',
            '*.postal_code' => 'required',
        );

        $validator = \Validator::make( $addresses, $rules);
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

}
