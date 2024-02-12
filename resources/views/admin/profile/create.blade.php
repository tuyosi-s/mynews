{{--ベーシックターム課題No21-4：課題３で作成した profile.blade.phpファイルを読み込む。--}}
@extends('layouts.profile')

{{--ベーシックターム課題No.21-4：プロフィールのページであることがわかるように titleとcontentを編集する--}}
 {{--admin.blade.phpの@yeld('title')に'ニュースの新規作成'を埋め込む--}}
       @section('title','プロフィールのページ')
       
       {{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}
       @section('content')
          <div class ="container">
              <div class ="row">
                  <div class ="col-md-8 mx-auto">
                     <h2>プロフィール</h2>
                     
                     @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                     
                      <form action="{{route('admin.profile.create')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                          <label class="col-md-2">氏名</label>
                             <div class="col-md-10">
                               <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                             </div>
                        </div>
                     
                        <div class="form-group row">
                          <label class="col-md-2">性別</label>
                             <div class="col-md-10">
                               <lavel>男</lavel>
                               <input type="radio" name="gender" >
                               <lavel>女</lavel>
                               <input type="radio" name="gender" >
                             </div>
                        </div>
                        
                        <div class="form-group row">
                          <label class="col-md-2">趣味</label>
                             <div class="col-md-10">
                               <input type="text" class="form-control" name="hobby" value="{{ old('hobby')}}">
                             </div>
                        </div>
                     
                        <div class="form-group row">
                          <label class="col-md-2">自己紹介欄</label>
                             <div>
                               <textarea class="form-contontrol" name="introduction" cols="50" rows="15">{{old ('introduction')}}</textarea>
                             </div>
                        </div>
                         @csrf
                              <input type="submit" class="btn btn-primary" value="更新">
                  </div>
              </div>
          </div>
       @endsection