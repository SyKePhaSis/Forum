@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="text-center"><h2>Edit Question</h2></div>

                <div class="card-body">
                    <form method="POST" action="/question/{{$question->id}}" enctype="multipart/form-data">
                        @csrf

                        @method('PATCH')
                        <div class="form-group row">
                            <label for="question" class="col-md-4 col-form-label text-md-right">Question</label>

                            <div class="col-md-6">
                                <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ $question->question }}"     autocomplete="question" autofocus>

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
                                <textarea id="description" rows="4" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $question->description }}" autocomplete="description" autofocus>{{ $question->description }}</textarea>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-2">
                            <div class="col-md-6 row offset-md-4">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('question.delete', ['question' => $question->id]) }}">
                        @csrf
                        @method('DELETE')
                        <div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </form>

                </div>
        </div>
    </div>
</div>
@endsection

