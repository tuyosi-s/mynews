@extends('layouts.profile')

@section('title','プロフィール')

@section('content')
    <div class="container">
        <div>
            <div>
                <h2>プロフィール</h2>
                @if(count($errors) > 0)
                       <ul>
                           @foreach($errors->all() as $e)
                              <li>{{ $e }}</li>
                           @endforeach
                       </ul>
                @endif
                    
                <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
        
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profiles_form->name }}">
                        </div>
                    </div>
                        
                        
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                               <label>男</label>
                               <input type="radio" name="gender" >
                               <label>女</label>
                               <input type="radio" name="gender" >
                        </div>
                    </div>
                 
                 
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="{{ $profiles_form->hobby }}">
                        </div>
                    </div> 
                        
                         
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介欄</label> 
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" cols="50" rows="15">{{$profiles_form->introduction}}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profiles_form->id }}">
                            @csrf
                            <input type="submiit" class="btn btn-primary" value="更新">
                        </div>    
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    
@endsection