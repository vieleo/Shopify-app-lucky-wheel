<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckEmail;

class DevicesController extends Controller
{
    public function index(){

        return view('/');
    }

    public function store(Request $request){

        CheckEmail::updateOrCreate([
            'id' => $request->product_id
        ],
        [
            'email' => $request->email
        ]);

        return response()->json(['success'=>'Product saved successfully.']);

    }
}
