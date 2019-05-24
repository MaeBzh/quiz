Feature: answerQuestion

  In order to play
  as a user
  I need to be able to answer a question

  Rules:
  - I nedd to choose between 4 answers

  Scenario: Answer a question
    Given that I have the question "Que veut dire PHP ?"
    When I click on button "A"
    Then I should see "Welldone !"




