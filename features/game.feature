Feature: Game startNewGame

  In order play a new game
  as a user
  I need to be able to launch a game

  Rules:
  - if I play against AI, i put only my name
  - if I play against another player, we both put our name

  Scenario: Playing against AI
    Given that I click on button "Start a new game"
    When I add my name in the form and submit the form
    Then I should start a new game

  Scenario: Playing against another player
    Given that I click on button "Start a new game"
    When I add my name and the player two name in the form and submit the form
    Then I should start a new game

  Scenario: Displaying the list of ended games
    Given that I click on button "Games"
    Then I should see the list of all ended games


