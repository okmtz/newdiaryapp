@extends('layouts.app')


@section('content')
    <div class="container mt-5">
            <div class="row">
                <div class="col mb-4">
                    @if(Auth::check())
                        <div class="card">
                            <div class="card-header">
                                <h4>user information</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text h3 my-4">user name  :  {{ Auth::user()->name }}</p>
                                <p class="card-text h3 my-4">email  :  {{ Auth::user()->email}}</p>
                                <p><a class="mt-5 " href="{{action('ContentController@index')}}">Go to Top page</a></p>
                            </div>
                        </div>
                        @else
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text text-center ">you aren't login now(<a href="{{url('login')}}">Login</a>|<a href="{{url('register')}}">Register</a>)</p>
                                </div>
                            </div>
                        @endif

                </div>
        </div>
@endsection