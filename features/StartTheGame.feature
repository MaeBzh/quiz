Feature: StartTheGame

  In order to play
  as a user
  I need to access to the game

  Scenario: Start a game
    Given I am on "http://localhost/quiz/public/"
    When I press "twoPlayers"
    Then I go to "http://localhost/quiz/public/games/create"
