Feature: Question addNewQuestion

  In order to create a new question
  as a user


  Rules:
  - I need to be fill all required form's inputs

  Scenario: Creating a new question
    Given that I click on button "Add a new question"
    When I fill all required inputs
    Then I should see my new question in the question's list

  Scenario: Displaying the list of all the questions
    Given that I click on button "Questions"
    Then I should see the list of all the questions
