<?php

namespace Tests\Feature;

use App\Game;
use App\User;
use Tests\TestCase;

class GameTest extends TestCase
{

    private $game;
    private $player1;
    private $player2;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->player1 = new User();
        $this->player1->name = "Toto";
        $this->player2 = new User();
        $this->player2->name = "Titi";
        $this->game = new Game();
    }

    public function testCreateNewGame()
    {
        $count_games = Game::count();

        $data = ["player1_name" => "Toto", "player2_name" => "Titi"];
        $this->post(route("games.store", $data));
        $this->assertDatabaseHas("users", ["name" => "Toto"]);
        $this->assertDatabaseHas("users", ["name" => "Titi"]);

        $this->assertEquals($count_games+1, Game::count());
    }

    public function testAnswerQuestion() {


    }

    protected function tearDown(): void
    {
        parent::tearDown(); // TODO: Change the autogenerated stub
    }

}