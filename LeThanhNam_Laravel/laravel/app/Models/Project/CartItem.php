<?php

namespace App\Models\Project;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cartitem';

    protected $idCart;
    protected $idProduct;
    protected $quantity;
    protected $nameProduct;
    protected $priceProduct;
    protected $imageProduct;

    public function addCartItem($idCart, $idProduct, $quantity)
    {
        try {
            DB::table($this->table)->insert([
                'idCart' => $idCart,
                'idProduct' => $idProduct,
                'quantity' => $quantity
            ]);
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }
}
