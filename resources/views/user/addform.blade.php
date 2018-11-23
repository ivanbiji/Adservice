@extends('layouts.usernav')
@section('content')
<div class="container">
    <div class="card animated fadeIn">
        <div class="card-header bg-dark" style="color:white; font-weight:600;">Post An Advertisement</div>
        <div class="card-body ">
            <h4>Category</h4>
            <br>
            <form method="POST" action="/ad/add" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <select class="form-control" id="category" name="category" value="{{ old('category') }}">
                        <option value="1">Books</option>
                        <option value="2">Electronics</option>
                        <option value="3">Vehicles</option>
                        <option value="4">Others</option>
                    </select>
                </div>
                @if ($errors->has('category'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('category') }}</strong>
                </span>
                @endif
                <hr>
                <h4>Title</h4><br>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="eg : Fundamentals of Database Management Systems 2nd Edition"
                        name="title" value="{{ old('title') }}">
                    @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>
                <hr>
                <div class="form-group">
                    <label for="comment">
                        <h4>Description</h4>
                        <br>
                    </label>
                    <textarea class="form-control" placeholder="eg : Two year old book in excellent condition.Computer Science text book. For DBMS, DBMS Lab etc"
                        rows="5" id="comment" name="description" value="{{ old('description') }}"></textarea>
                        @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif   
                </div>
                <hr>
                <div class="form-group">
                    <label for="comment">
                        <h4>Search Tags</h4>

                        <p>List all the tags with spaces. This field is used for the search option.</p><br>
                    </label>
                    <textarea class="form-control" placeholder="eg :Fundamentals of Database Management Systems 2nd Edition Mark L. Gillenson"
                        rows="5" id="comment2" name="searchtag" value="{{ old('searchtag') }}"></textarea>
                        @if ($errors->has('searchtag'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('searchtag') }}</strong>
                        </span>
                        @endif
                </div>
                <hr>
                <h4>Price (in rupees)</h4>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" placeholder="eg : 1200" name="price" value="{{ old('price') }}">
                    @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                    @endif
                </div>
                <hr>
                <h4>Upload photo(optional): </h4>
                <p>Image size should be below 1.2MB and in jpg,jpeg or png</p>
                <br>
                <div class="form-group">
                    <input type="file" class="form-control-file border" name="photo" id="myFile" value="{{ old('photo') }}">
                    @if ($errors->has('photo'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('photo') }}</strong>
                    </span>
                    @endif
                </div>
                <hr>
                <button type="submit" class="btn btn-warning btn-block">Post Ad</button>

            </form>


        </div>
        <div class="card-footer bg-dark" style="padding-bottom:20px;"></div>

    </div>

</div>

<script>
    $('#myFile').bind('change', function () {

        if (this.files[0].size > 1200000) {

            alert("ERROR : Image size greater than 1.2 MB");
            $(this).val("");

        }

    });

</script>
@endsection
