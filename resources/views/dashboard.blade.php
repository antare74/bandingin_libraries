<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-md-12">
                            @include('includes.form-dashboard-create')
                        <!-- Button trigger modal -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <h3>Libraries</h3>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($libraries) > 0)
                                    @foreach($libraries as $x => $library)
                                        <tr>
                                            <th scope="row">{{ $x+1 }}</th>
                                            <td><span id="library_name{{ $library->id }}">{{ $library->name }}</span></td>
                                            <td>
                                                <button type="button" id="{{ $library->id }}" class="btn btn-sm btn-primary editLibraries" data-toggle="modal" data-target="#exampleModal">
                                                    Edit
                                                </button>
                                                <a href="{{ '/libraries/delete/'.$library->id }}" class="btn btnDelete btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-7">
                            <h3>Books</h3>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Libraries</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($books) > 0)
                                    @foreach($books as $x => $book)
                                        <tr>
                                            <th scope="row">{{ $x+1 }}</th>
                                            <td><span id="bookTitle{{ $book->id }}">{{ $book->title }}</span></td>
                                            <td>
                                                @if(count($book->libraries) > 0)
                                                    @foreach($book->libraries as $library)
                                                        {{ $library->name }},
                                                    @endforeach
                                                @endif
                                            <td>
                                                <button type="button" id="{{ $book->id }}" class="btn btn-sm btn-primary editBooks" data-toggle="modal" data-target="#books">
                                                    Edit
                                                </button>
                                                <a href="{{ '/books/delete/'.$book->id }}" class="btn btnDelete btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('js')
        <script>
            $(".editLibraries").click(function (){
                let id = $(this).attr('id')
                let libText = $("#library_name"+id).text()
                $("input[name=library_id]").val(id)
                $("#Libraries").val(libText)
            });
            $(".addLibraries").click(function (){
                $("input[name=library_id]").val("")
                $("#Libraries").val("")
            });

            $(".editBooks").click(function (){
                let id = $(this).attr('id')
                let titText = $("#bookTitle"+id).text()
                $("input[name=book_id]").val(id)
                $("#titleBooks").val(titText)
            });

            $(".addBooks").click(function (){
                $("input[name=book_id]").val("")
                $("#titleBooks").val("")
            });
        </script>
    @endsection
</x-app-layout>
