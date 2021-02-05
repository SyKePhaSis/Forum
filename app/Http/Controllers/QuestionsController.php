<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Question;
use Illuminate\Http\Request;
use App\User;

class QuestionsController extends Controller
{
    public function create(User $user){
        return view('questions.create');
    }

    public function store(){

        $data = request()->validate([
            'question' => 'string|required',
            'description' => 'string|nullable'
        ]);

        auth()->user()->questions()->create([
            'question' => $data['question'],
            'description' => $data['description'],
        ]);

        return redirect('/profile/' . auth()->user()->id );

    }

    public function update(Question $question){

        $data = request()->validate([
            'question' => 'required',
            'description' => '',
        ]);

        $question->update([
            'question' => $data['question'],
            'description' => $data['description']
        ]);

        return redirect('/profile/' . $question->user->id);

    }

    public function show(Question $question){
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question, User $user){
        $this->authorize('update', $question);
        return view('questions.edit', compact('question'));
    }

    public function delete(Question $question){

        $question->delete();

        return redirect('/profile/' . $question->user->id);
    }


}
