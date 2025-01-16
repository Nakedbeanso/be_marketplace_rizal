<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $data = ProductType::all();
        return response ([
            "message" => "product type list",
            "data" => $data

        ]);
    }

    public function store(Request $request)
    {
        $request ->validate([
            'type_name' => 'required|unique :product_types,type_name',
        ], [
            'type_name.required' => 'please enter product name',
            "type_name.unique" => 'product already exist',
        ]);

        ProductType::create([
            'type_name' => $request->type_name,
        ]);
        
        return response([
            "message" => "product type created success"
        ],201);
    }

        public function show(string $id) {
            $data = ProductType::find ($id);

            if(is_null($data)) {
                return response([
                    "message" => "Product Type Not Found",
                    "data" =>[],
                ],404);
            }

            return response ([
                "message" => "Product detail",
                "data" => $data,
            ]);
        }


        public function update(Request $request,string $id){
            $request->validate([
                "type_name" => 'required|unique:product_types,type_name',
            ]);
            $data = ProductType::find($id);

            if(is_null($data)) {
                return response([
                    "message" => "product type not found",
                    "data" => []
                ],404);
            }
            
            $data->type_name = $request->type_name;
            $data->save();

            return response(["message" => "product type "]);
        }

        public function destroy(string $id){
            
            $data = ProductType::find ($id);

            if(is_null($data)){
                return response([
                    "message" => 'product not found',
                    "data" => [],
                ], 404);
            }
            $data->delete();

            return response([
                "message" => "product is deleted ",
                "data" => $data,
            ]);
        }
        

    
}
