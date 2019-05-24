<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Answer;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Question $question)
    {
        $answers = $question->answers()->get();
        return view('answers.index', compact('answers', 'question'));
    }

    /**
     * @param Question $question
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Question $question)
    {
        return view('answers.create', compact('question'));
    }

    /**
     * @param Request $request
     * @param Question $question
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, Question $question)
    {
        DB::beginTransaction();
        try {
            $question->answers()->save(new Answer([
                'name' => $request->input('name'),
                'is_valid' => $request->input('is_valid')
            ]));

            DB::commit();

            return redirect()->route('questions.show', compact('question'))
                ->with('success', "La réponse a été créée");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', $e->getMessage())
                ->withInput($request->all());
        }
    }


    /**
     * @param Question $question
     * @param Answer $answer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Question $question, Answer $answer)
    {
        return view('answers.edit', compact('question', 'answer'));
    }

    /**
     * @param Request $request
     * @param Question $question
     * @param Answer $answer
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Throwable
     */
    public function update(Request $request, Question $question, Answer $answer)
    {
        DB::beginTransaction();
        try {
            $answer->name = $request->name;
            $answer->is_valid = $request->filled('is_valid');
            $answer->saveOrFail();

            DB::commit();

            return redirect()->route('questions.show', compact('question'))
                ->with('success', 'La réponse a été éditée');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput($request->all());
        }
    }

    /**
     * @param Question $question
     * @param Answer $answer
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Question $question, Answer $answer)
    {
        DB::beginTransaction();
        try {
            $answer->delete();
            DB::commit();
            return redirect()->route('questions.show', compact('question'))->with('success', 'La réponse a été supprimée');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
