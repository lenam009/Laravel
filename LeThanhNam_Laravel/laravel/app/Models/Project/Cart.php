<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project\CartItem;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    public function session()
    {
        //flush xóa sach
        //Tạo session dạng mảng Session::put('name', []);
        //thêm phần tử vào mảng session  là Session::push('name', $item);

        //...Xóa 1 item trong session array
        // $productTest = Session::get('name1');
        // unset($productTest[indexCầnXóa]);
        // Session::put('name1',$productTest);
        //Xóa 1 session là Session::remove('cart')
    }

    public function addCartItemToSession($idProduct)
    {
        $idCol = [];
        if (count(Session::get('cart')) != 0) {
            //Nhận mảng idProduct
            $idCol = array_column(Session::get('cart'), 'idProduct');
        }
        //Trường hợp product đã có trong session
        if (in_array($idProduct, $idCol)) {
            //Tìm index của product có idProduct cần thêm
            $index = array_search($idProduct, $idCol);
            $carts = Session::get('cart');
            //Tăng quantity them 1
            $carts[$index]->quantity += 1;
            //Gán lai session
            Session::remove('cart');
            Session::put('cart', $carts);
        } //Trường hợp product chưa có trong session
        else {
            $productClass = new Product();
            $product = $productClass->getOneProductByIdProduct($idProduct);
            $item = new CartItem();
            $item->idProduct = $idProduct;
            $item->nameProduct = $product->nameProduct;
            $item->priceProduct = $product->priceProduct;
            $item->imageProduct = $product->imageProduct;
            $item->quantity = 1;
            Session::push('cart', $item);
            // $_SESSION['cart'][$idProduct] = $item;
        }
    }

    public function deleteProductFromSessionCart($idProduct)
    {
        //Nhận Session cart
        $carts = Session::get('cart');
        //Nhận mảng idProduct
        $idCol = array_column($carts, 'idProduct');
        //Tìm index của product có idProduct muốn xóa
        $index = array_search($idProduct, $idCol);
        //Thực hiện xóa product muốn xóa
        unset($carts[$index]);
        //Re-index lại data
        $carts = array_values($carts);
        //Gán lai session cart
        Session::remove('cart');
        Session::put('cart', $carts);
    }

    public function updateMoney($idCart, $money)
    {
        try {
            DB::table($this->table)->where('idCart', $idCart)->update([
                'money' => $money
            ]);
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function addCart($email)
    {
        try {
            DB::table($this->table)->insert([
                'email' => $email,
                'state' => 'Wait for confirmation',
            ]);
            $newId = DB::getPdo()->lastInsertId();
            return $newId;
        } catch (Exception $ex) {
            return -1;
        }
    }
}
