Feature: addNewQuestion

  In order to create a new question
  as a user
  I need to be fill all required form's inputs

  Scenario: Creating a new question
    Given the "question" field should contain "Quelle est la réponse ?"
    And the "category" field should contains "test"
    When I fill all required inputs
    Then I should see my new question in the question's list

  Scenario: Displaying the list of all the questions
    Given that I click on button "Questions"
    Then I should see the list of all the questions
