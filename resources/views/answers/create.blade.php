@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="text-center"><h2>Add Answer</h2></div>

                <div class="card-body">
                    <form method="POST" action="/question/{{ $question->id }}/answer/create" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="answer" class="col-md-4 col-form-label text-md-right">Answer</label>

                            <div class="col-md-6">
                                <input id="answer" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer" required autocomplete="answer" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" rows="4" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="" autocomplete="description" autofocus></textarea>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection
