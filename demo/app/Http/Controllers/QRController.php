<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Encrypt;
use DB;

class QRController extends Controller
{
    public function index(Request $request){
      $encryptdata = Crypt::encrypt($request->data);
      $encrypt = md5($encryptdata);
      $data = new Encrypt;
      $data->data = $encryptdata;
      $data->key = $encrypt;
      $data->save();
      return redirect()->back()->with('encrypt' , $encrypt);
    }

    public function image(Request $request){
      $image = QrCode::format('png')->generate($request->code);
      return response($image)->header('Content-type','image/png');
    }

    public function fill(Request $request){
      $data = Encrypt::where('key', $request->key)->first();
      $decrypt = Crypt::decrypt($data->data);
      return response()->json(['data' => $decrypt]);
    }
}
