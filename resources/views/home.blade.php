@extends('layouts.app')

@section('content')

@if(($questions->isEmpty()))

<div class='container'>
    <div class="row pt-5">
        <div class="pt-3 pb-3 col-12 d-flex justify-content-center align-items-baseline" style="">
            <h1>No qustions available at this time!</h1>
        </div>
    <div>
</div>

@else
<div class='container'>
    <div class="row pt-5">
        <div class="pt-3 pb-3 col-12 d-flex justify-content-center align-items-baseline" style="border-bottom: 1px darkblue solid;">
            <h1>Browse</h1>
        </div>
    <div>
</div>
@endif


@foreach ($questions as $question)

<div class='container'>
    <div class="row pt-5 d-flex justify-content-center">
        <div class="col-12">
            <div class="card" style=" border: 1px darkblue solid;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3" style="border-right: 1px darkblue solid;">
                            <img class='img-fluid rounded-circle img-thumbnail'src="/storage/{{ $question->user->profile->image}}">
                            <h6 class='text-center'>User: {{$question->user->username}}</h6>
                            <h6 class='text-center'>Created at: {{$question->created_at}}</h6>
                        </div>
                        <div class='col-9'>
                            <div class='question' style="border-bottom: 1px darkblue solid">
                                <h4 class='text-capitalize'><strong>{{ $question->question }}</strong></h4>
                            </div>
                            <div class='description pt-3'>
                                <h5 class='text-capitalize'>{{ $question->description }}</h5>
                            </div>
                            <div class='footer pt-3'>
                                <a href='{{ route("question.show", ["question" => $question->id ]) }}'> >>See Thread </a><br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class='container'>
    <div class="row pt-4">
        <div class="col-12 d-flex justify-content-center align-items-baseline pagination-md">
            {{ $questions->links()}}
        </div>
    </div>
</div>

@endsection
