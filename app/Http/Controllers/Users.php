<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
  function passRequest(Request $req)
   {

    $data = [
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'where' =>$request->input('where')
  ];

    $req->validate([
    //   'name'=> 'required | max:7',
    //   'email'=> 'required | min:3',
    //   'where'=> 'required | min:3'
    // ]);
    'name' => 'required|max:7|min:3',
    'email' => 'required|email',
    'where' => 'required|max:7|min:3'
],
[
    'required' => ':attributeはご入力必須です。',
    'email' => ':attributeはメール形式である必要があります。',
    'max' => ':attributeは3文字以上で7文字以内でご入力してください',
    'min' => ':attributeは3文字以上で7文字以内でご入力してください'
   
],
[
    'name' => '名前',
    'email' => 'メールアドレス',
    'where' => '都道府県',
]);



    return view('user-confirm', $data);
   }



}
