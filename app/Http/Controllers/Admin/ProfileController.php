<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
       return  view('admin/profile/create'); 
    }
    public function create(Request $request)
    {
        //ベーシックタームNo24課題にて以下を追記。
        //Validationを行う。
        $this->validate($request,Profile::$rules); 
        
        $profile = new profile;
        $form = $request->all();
        
    //フォームから送信されてきたtokenを削除
        unset($form['_token']);    
    
    //データベースに保存
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }    
    public function edit()
    {
        //dd('editが実行された');
        return view('admin/profile/edit');
    }
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
