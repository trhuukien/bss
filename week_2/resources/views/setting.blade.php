@extends('layout')
@section('title', 'Setting')
@section('setting', 'active')

@section('main-content')
<br>
<div>
    <form style="margin-top: 10px;" class="box" id="form-add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="content-box" style="text-align: left;">
            <div>
                <label for="">My name</label>
                <input class="input-active" style="height: 30px;" type="text" name="name" value="{{old('name', $user->name)}}">
                @error('name')
                <p style="text-align: left; color: red; margin: 0; font-size: 12px;">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Avatar</label>
                <input class="input-active" style="height: 30px;" type="file" name="avatar">
                @error('avatar')
                <p style="text-align: left; color: red; margin: 0; font-size: 12px;">{{$message}}</p>
                @enderror
                <img src="{{asset('storage/' . Auth::user()->avatar)}}" alt="" width="200px">
            </div>
            <center><button type="submit" class="btn mt-7">Send</button></center>
        </div>
    </form>
</div>

@endsection