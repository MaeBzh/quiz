<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameUserQuestion;
use App\UserAnswer;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $games = Game::all();
        return view('games.index', ['games' => $games]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('games.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $player_one = User::firstOrCreate(['name' => $request->player1_name]);
            $player_two = User::firstOrCreate(['name' => $request->player2_name]);

            $game = new Game();
            $game->playerOne()->associate($player_one);
            $game->playerTwo()->associate($player_two);
            $game->saveOrFail();

            foreach (Question::inRandomOrder()->limit(5)->get() as $question) {
                $guq = new GameUserQuestion();
                $guq->game()->associate($game);
                $guq->user()->associate($player_one);
                $guq->question()->associate($question);
                $guq->saveOrFail();
            }

            foreach (Question::inRandomOrder()->limit(5)->get() as $question) {
                $guq = new GameUserQuestion();
                $guq->game()->associate($game);
                $guq->user()->associate($player_two);
                $guq->question()->associate($question);
                $guq->saveOrFail();
            }

            DB::commit();
            return response()->redirectToRoute('games.show', $game);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * @param Game $game
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Game $game)
    {
        $game_user_question = $game->getNextQuestion();
        return view('games.show', compact('game', 'game_user_question'));
    }

    public function answer(Request $request, Game $game, User $user, Question $question)
    {
        $game_user_question = $game->userQuestions()->where('user_id', $user->id)
            ->where('question_id', $question->id)->firstOrFail();

        $answer = $question->answers()->where('id', $request->answer)->firstOrFail();

        $game_user_question->answer()->associate($answer);
        $game_user_question->saveOrFail();

        if ($answer->is_valid) {
            if ($game->playerOne->is($user)) {
                $game->player1_points += 1;
            } else {
                $game->player2_points += 1;
            }
            $game->saveOrFail();

            $response = 'success';
        } else {
            $response = 'fail';
        }
        return view('games.answer', compact('game', 'response'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
