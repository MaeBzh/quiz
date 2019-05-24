Feature: addNewQuestion

  In order to create a new question
  as a user
  I need to be fill all required form's inputs

  Scenario: Creating a new question
    Given the "question | category | difficulty" field should contain "Quelle est la réponse ? | test | 1"
    When I press "Add"
    Then I should see text matching "La question a été créée"

  Scenario: Adding an answer
    Given the "answer | category | difficulty" field should contain "Quelle est la réponse ? | test | 1"
    When I press "A"
