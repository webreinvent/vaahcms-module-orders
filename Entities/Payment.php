<?php namespace VaahCms\Modules\Orders\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use WebReinvent\VaahCms\Entities\User;

class Payment extends Model {

    use SoftDeletes;

    //-------------------------------------------------
    protected $table = 'vh_ord_payments';
    //-------------------------------------------------
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];
    //-------------------------------------------------
    protected $dateFormat = 'Y-m-d H:i:s';
    //-------------------------------------------------

    protected $fillable = [

        'vh_ord_order_id', 'uuid', 'type',
        'currency', 'payment_method', 'payment_attempts',
        'last_payment_attempt_at', 'status', 'amount',
        'paid_amount', 'transaction_id', 'payment_url',
        'payment_date_time', 'meta', 'payment_meta',
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
}
