@extends('layouts.test')

@section('content')
    <form method="POST" action="{{ action('ContentController@store') }}">
        @csrf 
        <input name="user_id" type="hidden" value="{{ $user->id }}">
        <textarea id="name" name="name" placeholder="コンテンツの名前を入力してください"></textarea>
        <button type="submit">Submit</button>
    </form>
   
@endsection