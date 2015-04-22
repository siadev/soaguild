Feature: Testing Pages or Site Map accessible to everyone
Why:   In order to navigate un-restricted parts of the site
Who:   As a guest or member
What:  I want to demonstrate that the pages are accessible to everyone

  Scenario: Home Page
    Given I am on the homepage
    Then I should see "Welcome"
#    And wait 2 seconds

  Scenario: News Page
    When I go to "news"
    Then I should see "Whats new?"
#    And wait 2 seconds

  Scenario: About Page
    When  I go to "about"
    Then I should see "Who we are . . . "
#    And wait 3 seconds


