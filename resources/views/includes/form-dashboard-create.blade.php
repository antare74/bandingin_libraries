<div class="row">
    <div class="col-md-6">
        <button type="button" class="btn btn-sm btn-success addLibraries" data-toggle="modal" data-target="#exampleModal">
            Add Libraries
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('store.libraries') }}">
                            @csrf
                            <input type="hidden" name="library_id" value="">
                            <div class="form-group">
                                <label for="Libraries">Libraries</label>
                                <input type="text" name="name" class="form-control" id="Libraries" aria-describedby="emailHelp">
                                <small id="librariesHelp" class="form-text text-muted">add new libraries here</small>
                            </div>
                            <div class="float-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>

        @if(count($libraries) > 0)
            <button type="button" class="btn btn-sm btn-success addBooks" data-toggle="modal" data-target="#books">
                Add Books
            </button>
            <!-- Modal -->
            <div class="modal fade" id="books" tabindex="-1" aria-labelledby="books" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ route('store.books') }}">
                                @csrf
                                <input type="hidden" name="book_id" value="">
                                <div class="form-group">
                                    <label for="titleBooks">Books</label>
                                    <input type="text" name="title" class="form-control" id="titleBooks" aria-describedby="titleBooks">
                                </div>
                                <div class="input-group mb-3">
                                    <select class="custom-select" multiple size="3" name="library_id[]" id="inputGroupSelect02">
                                        <option value="" selected disabled>Choose...</option>
                                        @if(count($libraries) > 0)
                                            @foreach($libraries as $library)
                                                <option value="{{ $library->id }}">{{ $library->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="inputGroupSelect02">Options</label>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
