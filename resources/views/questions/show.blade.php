@extends('layouts.app')

@section('content')
<div class='container'>
    <div class="row pt-5">
        <div class="pt-3 pb-3 col-12 d-flex justify-content-center align-items-baseline" style="border-bottom: 1px darkblue solid;">
            <h1>Question</h1>
        </div>
    <div>
</div>

<div class="container">
    <div class="row pt-5">
        <h1><strong>{{$question->question}}</strong></h1>
    </div>

    <div class="row pt-3">
        <h4>{{$question->description}}</h4>
    </div>

    <div class="row pt-3 d-block">
        <h5>Submitted by: <a href="/profile/{{$question->user->id}}"><strong>{{$question->user->name}}</strong></a></h5>
        <h5>Submitted at: <strong>{{$question->created_at}}</strong></h5>
        <a href='{{ route("answer.create", ["question" => $question->id ]) }}'> >>Create Answer</a>
    </div>
</div>

<div class='container'>
    <div class="row pt-5">
        <div class="pt-3 pb-3 col-12 d-flex justify-content-center align-items-baseline" style="border-top: 1px darkblue solid; border-bottom: 1px darkblue solid;">
            <h1>Answers</h1>
        </div>
    <div>
</div>

@if (($question->answers->isEmpty()))
<div class='container'>
    <div class="row pt-5">
        <div class="pt-3 pb-3 col-12 d-flex justify-content-center align-items-baseline" style="">
            <h1>There are no answers yet!</h1>
        </div>
    <div>
</div>
@endif

@foreach ($question->answers as $answer)

<div class='container'>
    <div class="row pt-5 d-flex justify-content-center">
        <div class="col-12">
            <div class="card" style=" border: 1px darkblue solid;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3" style="border-right: 1px darkblue solid;">
                            <img class='img-fluid rounded-circle img-thumbnail'src="/storage/{{ $answer->user->profile->image}}">
                            <h6 class='text-center'>User: {{$answer->user->username}}</h6>
                            <h6 class='text-center'>Created at: {{$answer->created_at}}</h6>
                        </div>
                        <div class='col-9'>
                            <div class='question' style="border-bottom: 1px darkblue solid">
                                <h4 class='text-capitalize'><strong>{{ $answer->answer }}</strong></h4>
                            </div>
                            <div class='description pt-3'>
                                <h5 class='text-capitalize'>{{ $answer->description }}</h5>
                            </div>
                            <a href="/profile/{{ $answer->user->id }}"> >>View User</a><br>


                            @can('update', $answer)

                            <a href="/question/{{ $answer->question->id }}/answer/{{ $answer->id }}/edit"> >>Edit Question</a>

                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection
