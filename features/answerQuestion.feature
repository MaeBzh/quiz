Feature: answerQuestion

  In order to play
  as a user
  I need to be able to answer a question

  Rules:
  - I need to choose between several answers

  Scenario: Answer a question
    Given I am on "public/games/$id"
    When I should see "test?"
    Then I press "Answer 1"

