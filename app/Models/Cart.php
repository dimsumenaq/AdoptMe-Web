<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'no_invoice',
        'status_cart',
        'status_pembayaran',
        'status_pengiriman',
        'no_resi',
        'ekspedisi',
        'subtotal',
        'ongkir',
        'total',
        'bukti_pembayaran',
        'created_at',
        'updated_at'];
    public $timestamps = true;
    protected $primaryKey = 'IDCart';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'IDUser');
    }
    public function detail(){
        return $this->hasMany(CartDetail::class, 'cart_id', 'IDCart');
    }
    public function updatetotal($itemcart, $subtotal) {
        $this->attributes['subtotal'] = $itemcart->subtotal + $subtotal;
        $this->attributes['total'] = $itemcart->total + $subtotal;
        self::save();
    }
}
