@extends('layouts.guest')

@section('content')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if(count($libraries) > 0)
                @foreach($libraries as $library)
                    <div class="row text-center  bg-green-600 pb-5">
                        <div class="col-md-12">
                            <h1>{{ $library->name }}</h1>
                        </div>
                        @if(count($library->books) > 0 )
                            @foreach($library->books as $book)
                                <div class="col-md-4 col-12 col-lg-4">
                                    <div class="card" width="18">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $book->title }}</h5>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <br>
                    <hr>
                @endforeach
            @endif
        </div>
    </div>
@endsection
