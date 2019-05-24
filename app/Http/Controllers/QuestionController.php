<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all(); // class Question's function

        return view('questions.index', compact('questions'));
    }

    /**
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Question $question)
    {
        $answers = $question->answers()->get();

        return view('questions.show', compact('question', 'answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $question = Question::create([
                'question' => $request->input('question'),
                'category' => $request->input('category'),
                'difficulty' => $request->input('difficulty')
            ]);
            DB::commit();
            return redirect()->route('questions.show', compact('question'))
                ->with('success', 'La question a été créée');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    /**
     * @param Request $request
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(Request $request, Question $question)
    {
        DB::beginTransaction();
        try {
            $question->question = $request->question;
            $question->category = $request->category;
            $question->difficulty = $request->difficulty;
            $question->saveOrFail();

            DB::commit();
            return redirect(route('questions.show', compact('question')))
                ->with('success', 'La question a été modifiée');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput($request->all())
                ->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Question $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        DB::beginTransaction();
        try {
            $question->delete();

            DB::commit();
            return redirect(route('questions.index'))
                ->with('success', 'La question a été supprimée');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
