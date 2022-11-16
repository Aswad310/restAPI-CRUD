<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CountryModel;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    ############ Read Countries ############
    public function country()
    {
        return response()->json(CountryModel::get(), 200); # 200-OK
    }

    ############ Read Country By ID ############
    public function countryByID($id)
    {
        $country = CountryModel::find($id);
        if (is_null($country)){
            return response()->json(['message' => 'Record not found!'], 404);
        }
        return response()->json($country, 200);
    }

    ############ Create Country ############
    public function countrySave(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'iso' => 'required|unique:_z_country|min:2|max:2',
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()){
            return response()->json($validation->errors(), 400); # 400 - server can't understand a request
        }
        $country = CountryModel::create($request->all());
        return response()->json($country, 201); # 201-Created
    }

    ############ Update Country ############
    public function countryUpdate(Request $request, $id)
    {
        $country = CountryModel::find($id);
        if (is_null($country)){
            return response()->json(['message' => 'Record not found!'], 404);
        }
        $country->update($request->all());
        return response()->json($country, 200); # 200-OK
    }
    
    ############ Delete Country ############
    public function countryDelete(Request $request, $id)
    {
        $country = CountryModel::find($id);
        if (is_null($country)){
            return response()->json(['message' => 'Record not found!'], 404);
        }
        $country->delete();
        return response()->json(null, 204); # 204-No Content
    }
}
