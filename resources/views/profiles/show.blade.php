@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row  pt-5">
        <div class="col-3">
            <img class="img-fluid rounded-circle" style="border: 2px darkblue solid" src="/storage/{{ $user->profile->image}}">
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between  align-items-baseline">
                <h1 class="text-center text-capitalize" style="border-bottom: 3px darkblue solid; border-radius: 10px; font-size: 3vw;">{{ $user->username }}</h1>
                <div style="font-size: 1.5vw; border-bottom: 3px darkblue solid; border-radius: 8px;">

                @if(auth()->user()->id == $user->id or auth()->user()->moderator == True)
                    <a href='{{ route("profile.edit", ['user' => $user->id ]) }}'>Edit Profile</a>
                @endif

                @if(auth()->user()->id == $user->id or auth()->user()->moderator == True)
                    <a href='{{ route("question.create")}}' style="border-left: 2px darkblue solid;" class="pl-2">Add Question</a>
                @endcan

                </div>
            </div>
            <div class="pt-3">
                <h5 style="font-size: 1.5vw;">{{ $user->profile->description ?? 'User has no description.' }}</h5>
                <h5><strong>{{ $user->profile->url }}</strong></h5>
                <h5><strong>{{ $user->profile->business_email }}</strong></h5>
            </div>
        </div>
    </div>
</div>

<div class='container'>
    <div class="row pt-5">
        <div class="pt-3 pb-3 col-12 d-flex justify-content-center align-items-baseline" style="border-top: 1px darkblue solid; border-bottom: 1px darkblue solid;">
            <h1>Questions</h1>
        </div>
    <div>
</div>

@foreach ($user->questions as $question)

<div class='container'>
    <div class="row pt-5 d-flex justify-content-center">
        <div class="col-12">
            <div class="card" style=" border: 1px darkblue solid;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3" style="border-right: 1px darkblue solid;">
                            <img class='img-fluid rounded-circle img-thumbnail'src="/storage/{{ $user->profile->image}}">
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

                                @can('update', $question)
                                <a href='{{ route("question.edit", ["question" => $question->id ]) }}'> >>Edit Question </a>
                                @endcan

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach



@endsection
