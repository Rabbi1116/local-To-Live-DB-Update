<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'price' => 'required',
                'description' => 'nullable',
            ]);

            Product::create($request->only(['name', 'price', 'description']));

            return redirect()->back()->with('success', 'Data Store Successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('danger', 'Something was Wrong');
        }
    }

    public function syncDatabase(Request $req)
    {
        try {
            $test =  Product::upsert($req->product, ['name'], ['name', 'price', 'description']);
            return  $test;
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with('danger', 'Something was Wrong');
        }
    }
}
