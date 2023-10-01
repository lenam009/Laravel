<?php

namespace App\Models\Project;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;

use function PHPUnit\Framework\returnSelf;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    public static $limit = 6;

    public function getAllProduct()
    {
        $data = DB::table($this->table)->orderByDesc('idProduct')->get();
        return $data;
    }

    public function getAllProductByPage($limit)
    {
        $data = DB::table($this->table)->orderBy('idProduct','desc')->paginate($limit);
        return $data;
    }

    public function getAllProductByPageByIdTypeProduct($limit, $idTypeProduct)
    {
        $data = DB::table($this->table)->where('idTypeProduct', $idTypeProduct)->orderBy('idProduct','desc')->paginate($limit);
        return $data;
    }

    // public function getCountAllProduct()
    // {
    //     $products = $this->getAllProduct();
    //     return count($products);
    // }

    // public function getCountAllProductByIdTypeProduct($idTypeProduct)
    // {
    //     $products = $this->getAllProductByIdTypeProduct($idTypeProduct);
    //     return count($products);
    // }

    public static function getOffset($page)
    {
        $offset = ($page - 1) * Product::$limit;
        return $offset;
    }

    public static function getMaxPage($count)
    {
        $max = ceil($count / Product::$limit);
        return $max;
    }

    public function getAllProductByIdTypeProduct($idTypeProduct)
    {
        $data = DB::table($this->table)->where('idTypeProduct', $idTypeProduct)->orderByDesc('idProduct')->get();
        return $data;
    }

    public function getRandomNameImage($extension)
    {
        $nameImage = 'image_' . uniqid() . '.' . $extension;
        while (File::exists(public_path('storage/images/' . $nameImage))) {
            $nameImage = 'image_' . uniqid() . '.' . $extension;
        }
        return $nameImage;
    }

    public function storeImageProduct($pathImage, $nameImage)
    {
        try {
            if (!move_uploaded_file($pathImage, public_path('storage/images/' . $nameImage)))
                return false;
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function addProduct($data, $pathImage)
    {
        try {
            //Thực hiện việc luu image vào folder public/storage/images.
            if (!$this->storeImageProduct($pathImage, $data['imageProduct'])) {
                return false;
            }
            //Thực hiện thêm vào csdl
            $result = DB::table($this->table)->insert($data);
            //$id=DB::getPdo()->lastInsertId();
            return $result;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function getOneProductByIdProduct($idProduct)
    {
        $data = DB::table($this->table)->where('idProduct', $idProduct)->leftJoin('typeproduct', 'product.idTypeProduct', '=', 'typeproduct.idTypeProduct')->first();
        return $data;
    }

    public function deleteProduct($idProduct)
    {
        try {
            $result = DB::table($this->table)->where('idProduct', $idProduct)->delete();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function deleteImageProduct($idProduct)
    {
        try {
            $result = DB::table($this->table)->where('idProduct', $idProduct)->update([
                'imageProduct' => null,
            ]);
            $oldProduct = $this->getOneProductByIdProduct($idProduct);
            $this->deleteStoreImage($oldProduct->imageProduct);
            return $result;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function deleteStoreImage($nameImage)
    {
        unlink(public_path('storage/images/' . $nameImage));
    }

    public function updateProduct($data, $idProduct, $pathImage)
    {
        try {
            //Update lai image product nếu người dúng có thay đổi
            if (isset($pathImage)) {
                if (!$this->storeImageProduct($pathImage, $data['imageProduct']))
                    return -1;
                //Thực hiện việc xóa ảnh cũ
                $oldProduct = $this->getOneProductByIdProduct($idProduct);
                if (isset($oldProduct->imageProduct))
                    $this->deleteStoreImage($oldProduct->imageProduct);
            }
            //Thực hiện cập nhật
            $result = DB::table($this->table)->where('idProduct', $idProduct)->update($data);
            return $result;
        } catch (Exception $ex) {
            return -1;
        }
    }
}
