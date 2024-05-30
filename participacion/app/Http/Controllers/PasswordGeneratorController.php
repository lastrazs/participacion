<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Password;

class PasswordGeneratorController extends Controller{

    public function generatePassword(Request $request){

        $length = $request->input('length, 16');

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';

        $password = $this->randomPassword($length, $characters);

        $savePassword = Password::create(['password' => $password]);

        return response() ->json(['password' =>
        $savePassword->password]);
    }

    public function randomPassword($length, $characters){
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
