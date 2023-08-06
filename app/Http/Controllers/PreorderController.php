<?php

namespace App\Http\Controllers;
use App\Models\Preorder;
use App\Models\Product;

use Illuminate\Http\Request;

class PreorderController extends Controller
{

    public function get_all_preorders()
    {
        // $preorders = Preorder::all();

        // $users = User::join('posts', 'users.id', '=', 'posts.user_id')->get(['users.*', 'posts.description']);
        $preorders = Product::join('preorders', 'preorders.product_id', '=', 'products.id')->get(['products.*', 'preorders.*']);

        return response()->json($preorders);
    }

    public function insert_preorder(Request $request)
    {
        $preorder = new Preorder;

        $preorder->nrc = $request->nrc;
        $preorder->name = $request->name;
        $preorder->phone = $request->phone;
        $preorder->secondary_phone = $request->secondary_phone;
        $preorder->email = $request->email;
        $preorder->address = $request->address;
        $preorder->latitude = $request->latitude;
        $preorder->longitude = $request->longitude;
        $preorder->product_id = $request->product_id;

        $preorder->save();
        return response('Your order is created', 201);
        // return $request->all();

    }
}
        //         use App\Models\Flight;

// $flight = Flight::create([
//     'name' => 'London to Paris',
// ]);
