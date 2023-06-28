<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\AddToCartRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user())
            return redirect()->route('verification.notice');
        $countProducts = count(Auth::user()->products);
        $view = $this->cart();

        return view('clients.cart.cart', compact('view', 'countProducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddToCartRequest $request)
    {
        $product = Cart::where('product_id', $request->id)
            ->where('color', $request->color)
            ->where('size', $request->size)
            ->where('user_id', Auth::user()->id)->first();
        if(!$product){
            Cart::insert([
                'product_id' => $request->id,
                'quantity' => 1,
                'color' => $request->color,
                'size' => $request->size,
                'user_id' => Auth::user()->id
            ]);
        }else{
            $product->quantity++;
            $product->save();
        }
        return back()->with('msg', 'Thêm vào giỏ hàng thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo $id;
//        Cart::find($id)->delete();
//        $view = $this->cart();
//        return $view;
    }

    public function cart(){
        $itemsCart = Auth::user()->products;
        return view('clients.cart.cart-item', compact('itemsCart'));
    }

    public function deleteCartItem(Request $request){
        if($request->ajax()){
            $data = $request->all();
            Cart::find($data['cartid'])->delete();
            $view = $this->cart();
            return $view;
        }
    }

    public function updateCartItem(Request $request){
        if($request->ajax()){
            $data = $request->all();
            DB::table('carts')->where('id', $data['cartid'])->update(['quantity' => $data['qty']]);

            $view = $this->cart();
            return $view;
        }
    }
}
