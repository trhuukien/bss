@extends('layout')
@section('title', 'Add Log')
@section('log', 'active')

@section('main-content')

<div class="mx-200px">
    <div class="row">
        <div class="d-flex align-items-center justify-content-between p-0">
            <h3>ADD LOG</h3>
        </div>
        <span class="txt1" style="color: red; font-family: Arial, Helvetica, sans-serif;">
            @if(session('msg'))
            <p>{{session('msg')}}</p>
            @endif
        </span>
        <form style="margin-top: 10px;" class="box" id="form-add" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content-box" style="text-align: left;">
                <div>
                    <label for="">Name</label>
                    <input class="input-active" style="height: 30px;" type="text" name="name" value="{{old('name')}}">
                    @error('name')
                    <p style="text-align: left; color: red; margin: 0 0 10px 0; font-size: 12px;">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="">Dashboard</label>
                    <select class="input-active" style="height: auto;" name="db_id" id="">
                        @foreach($dashboards as $d)
                        <option @if($d->id == old('db_id'))
                            selected
                            @endif value="{{$d->id}}">ID: {{$d->id}} - MAC: {{$d->mac}}</option>
                        @endforeach
                    </select>
                    @error('db_id')
                    <p style="text-align: left; color: red; margin: 0 0 10px 0; font-size: 12px;">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="">Action</label>
                    <input class="input-active" style="height: 30px;" type="text" name="action" value="{{old('action')}}">
                    @error('action')
                    <p style="text-align: left; color: red; margin: 0 0 10px 0; font-size: 12px;">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="">Date</label>
                    <input class="input-active" style="height: 30px;" type="date" name="date" value="{{old('date')}}">
                    @error('date')
                    <p style="text-align: left; color: red; margin: 0 0 10px 0; font-size: 12px;">{{$message}}</p>
                    @enderror
                </div>
                <center><button type="submit" class="btn mt-7">Send</button></center>
            </div>
        </form>
    </div>
    <br>
</div>

@endsection