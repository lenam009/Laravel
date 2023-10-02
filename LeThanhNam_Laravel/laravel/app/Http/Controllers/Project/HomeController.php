<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project\Cart;
use Illuminate\Http\Request;
use App\Models\Project\Product;
use App\Models\Project\TypeProduct;
use Illuminate\Support\Facades\Validator;
use App\Models\Project\CartItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $productClass;
    private $typeProductClass;
    private $cartClass;
    private $cartItemClass;
    public function __construct()
    {
        $this->productClass = new Product();
        $this->typeProductClass = new TypeProduct();
        $this->cartClass = new Cart();
        $this->cartItemClass = new CartItem();
    }

    public function index()
    {
        $products = $this->productClass->getAllProductByPage(Product::$limit);
        $typeProducts = $this->typeProductClass->getAllTypeProduct();
        return view('project.index', compact('products', 'typeProducts'));
    }

    public function getProductByPage()
    {
        // //Nhận offset
        // $offset = Product::getOffset($page);
        // //Nhận count tất cả sản phẩm
        // $count = $this->productClass->getCountAllProduct();
        // //Nhận số trang tối đa
        // $maxPage = Product::getMaxPage($count);

        // //Nhận toàn bộ sản phẩm theo page
        $products = $this->productClass->getAllProductByPage(Product::$limit);
        $typeProducts = $this->typeProductClass->getAllTypeProduct();
        return view('project.index', compact('products', 'typeProducts'));
    }

    public function getProductByIdTypeProduct($idTypeProduct = 0)
    {
        $products = $this->productClass->getAllProductByPageByIdTypeProduct(Product::$limit, $idTypeProduct);

        $typeProducts = $this->typeProductClass->getAllTypeProduct();
        return view('project.index', compact('products', 'typeProducts'));
    }
    public function getProductByPageByIdTypeProduct($idTypeProduct = 0)
    {
        //Nhận toàn bộ sản phẩm theo loại theo page
        $products = $this->productClass->getAllProductByPageByIdTypeProduct(Product::$limit, $idTypeProduct);

        $typeProducts = $this->typeProductClass->getAllTypeProduct();
        return view('project.index', compact('products', 'typeProducts'));
    }

    public function handleNewProduct(Request $request)
    {
        $rules = [
            'nameProduct' => ['required'],
            'file' => ['required'],
            'priceProduct' => ['required', 'integer', 'min:1',],
        ];
        $messages = [
            'required' => ":attribute not been empty",
            'min' => ":attribute not been less than :min VNĐ"
        ];
        $attributes = [
            'nameProduct' => 'Name product',
            'file' => 'Image',
            'priceProduct' => 'Price product'
        ];
        //Thực hiện validate form
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        if ($validator->fails()) {
            $validator->errors()->add('msg', 'New product failed');
            return back()->withErrors($validator)->withInput();
        } else {
            //Thực hiện việc lấy ngẫu nhiên tên ảnh
            $randomNameImage = $this->productClass->getRandomNameImage($request->file('file')->extension());
            //Tạo biến data để cho việc thêm
            $data = [
                'nameProduct' => $request->nameProduct,
                'imageProduct' => $randomNameImage,
                'contentProduct' => $request->contentProduct,
                'priceProduct' => $request->priceProduct,
                'idTypeProduct' => $request->idTypeProduct,
                'screen' => $request->screen,
                'CPU' => $request->CPU,
                'RAM' => $request->RAM,
                'hardDrive' => $request->hardDrive
            ];
            //Gọi hàm thêm của class Product
            $result = $this->productClass->addProduct($data, $request->file('file')->path());
            //Check kết quả sau khi thêm
            if ($result) {
                return back()->with('msg', 'New product successed');
            } else {
                return back()->withErrors($validator->errors()->add('msg', 'New product failed'));
            }
        }
    }

    public function productDetail($idProduct = 0)
    {
        $product = $this->productClass->getOneProductByIdProduct($idProduct);
        $typeProducts = $this->typeProductClass->getAllTypeProduct();
        return view('project.product', compact('product', 'typeProducts'));
    }

    public function newProduct()
    {
        $typeProducts = $this->typeProductClass->getAllTypeProduct();
        return view('project.newProduct', compact('typeProducts'));
    }

    public function deleteProduct($action = '', $idProduct = 0)
    {
        //Xác nhận trước khi xóa sản phẩm
        if ($action == 'delete') {
            return back()->with('command', 'delete');
        } elseif ($action == 'yes') {
            //Thực hiện việc xóa
            $result = $this->productClass->deleteProduct($idProduct);
            //Xóa thành công chuyển đến trang chủ, ngược lại báo lỗi
            if ($result == 1) {
                return redirect(route('project.index'));
            } else {
                return back()->with('msg', 'Product is being used, so cannot delete !!!');
            }
        }
    }
    public function updateProduct($idProduct = 0)
    {
        $product = $this->productClass->getOneProductByIdProduct($idProduct);
        $typeProducts = $this->typeProductClass->getAllTypeProduct();
        return view('project.update', compact('product', 'typeProducts'));
    }
    public function handleUpdateProduct(Request $request)
    {
        //Tạo biến validate
        $rules = [
            'nameProduct' => ['required'],
            'priceProduct' => ['required', 'integer', 'min:1',],
        ];
        $messages = [
            'required' => ":attribute not been empty",
            'min' => ":attribute not been less than :min VNĐ"
        ];
        $attributes = [
            'nameProduct' => 'Name product',
            'priceProduct' => 'Price product'
        ];
        //Thực hiện validator
        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        //Xác nhận trước khi xóa ảnh
        if ($request->has('delete')) {
            return back()->with('command', 'delete');
        } //Thực hiện xóa ảnh
        elseif ($request->has('yes')) {
            $result = $this->productClass->deleteImageProduct($request['idProduct']);
            if ($result == 1) {
                return back()->with('msgImage', 'Delete image successed');
            } else {
                return back()->with('msgImage', 'Delete image failed');
            }
        } //Thực hiện nút back
        else if ($request->has('back')) {
            return back();
        } //Thực hiện việc validate và update
        elseif ($request->has('update')) {
            //Nếu validate failed thì back
            if ($validator->fails()) {
                return back()->withErrors($validator);
            } //Thực hiện update khi validate đã thành công
            else {
                $data = [
                    'nameProduct' => $request->nameProduct,
                    'contentProduct' => $request->contentProduct,
                    'priceProduct' => $request->priceProduct,
                    'idTypeProduct' => $request->idTypeProduct,
                    'screen' => $request->screen,
                    'CPU' => $request->CPU,
                    'RAM' => $request->RAM,
                    'hardDrive' => $request->hardDrive
                ];
                //Trường hợp người dùng có update lại image
                if ($request->has('file')) {
                    $randomNameImage = $this->productClass->getRandomNameImage($request->file('file')->extension());
                    $data['imageProduct'] = $randomNameImage;
                    $result = $this->productClass->updateProduct($data, $request['idProduct'], $request->file('file')->path());
                } //Trường hợp người dùng ko update lại image
                else {
                    $result = $this->productClass->updateProduct($data, $request['idProduct'], null);
                }
                //Hiện thị kết quả cho người dùng
                if ($result == 1 || $result == 0) {
                    return back()->with('msgSuccess', 'Update success');
                } else {
                    return back()->with('msg', 'Update failed');
                }
            }
        }
    }

    public function cart()
    {
        $typeProducts = $this->typeProductClass->getAllTypeProduct();
        return view('project.cart', compact('typeProducts'));
    }

    public function handleBuyProduct($idProduct)
    {
        //Tạo session giỏ hàng nếu chưa có
        if (!Session::has('cart'))
            Session::put('cart', []);
        //Check xem product người dùng muốn mua có tồn tại?
        $product = $this->productClass->getOneProductByIdProduct($idProduct);
        if (!isset($product)) {
            abort(404);
        } else {
            //Đưa product mà người dùng mua vào session giỏ hàng nếu product có tồn tại
            $this->cartClass->addCartItemToSession($idProduct);
            return back()->with('msgSuccess', 'Buy success');
        }
    }

    public function payment()
    {
        //Tạo hóa đơn mới và nhận id hóa đơn vừa tạo
        $idNewCart = $this->cartClass->addCart(null);
        if ($idNewCart == -1) {
            return back()->withInput()->with('msgFailed', 'Payment failed becausse cannot create a cart');
        } else {
            $money = 0;
            //Đưa từng item vào bảng chi tiết hóa đơn
            foreach (Session::get('cart') as $cartItem) {
                if (!$this->cartItemClass->addCartItem($idNewCart, $cartItem->idProduct, $cartItem->quantity)) {
                    return back()->withInput()->with('msgFailed', 'Payment failed');
                }
                $money += $cartItem->priceProduct * $cartItem->quantity;
            }
            //Thực hiện việc update lại money cho hóa đơn
            if (!$this->cartClass->updateMoney($idNewCart, $money)) {
                return back()->with('msgSuccess', 'Payment successed because total money failed');
            }
            //Xóa session cart sau khi đã thanh toán thành công
            Session::remove('cart');
            return back()->with('msgSuccess', 'Payment successed');
        }
    }

    public function login()
    {
        $typeProducts = $this->typeProductClass->getAllTypeProduct();
        return view('project.login', compact('typeProducts'));
    }

    public function handleLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {
            return redirect()->route('project.index');
        }
        return back()->withInput()->with('msgFailed', 'Email or password incorrect');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('project.login');
    }
}
