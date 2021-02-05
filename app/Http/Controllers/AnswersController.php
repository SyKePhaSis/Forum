<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;
use App\User;

class AnswersController extends Controller
{
    public function create(Question $question){
        return view('answers.create', compact('question'));
    }

    public function edit(Question $question, User $user, Answer $answer){
        $this->authorize('update', $answer, $user);
        return view('answers.edit', compact('answer'));
    }

    public function store(Question $question){

        $data = request()->validate([
            'answer' => 'required',
            'description' => ''
        ]);

        auth()->user()->answers()->create([
            'answer' => $data['answer'],
            'description' => $data['description'],
            'question_id' => $question->id
        ]);

        return redirect('/question/'. $question->id);

    }

    public function update(Answer $answer){

        $data = request()->validate([
            'answer' => 'required',
            'description' => ''
        ]);

        $answer->update([
            'answer' => $data['answer'],
            'description' => $data['description'],
        ]);

        return redirect('/question/' . $answer->question->id);
    }

    public function delete(Answer $answer){

        $answer->delete();

        return redirect('/question/' . $answer->question->id);
    }

}
