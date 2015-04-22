Feature: Testing Pages with restricted access - members only
  Why:   In order to navigate restricted areas of the site.
  Who:   As a member
  What:  I want to demonstrate that the pages are accessible to members only

#  @javascript
  Scenario: Registration
    When I register "Borca" "borca@soaguild.com"
    Then I should have an account
#    And wait 20 seconds

  Scenario: Events - Test for restricted access and member access
    When I go to "events"
    Then the url should match "auth/login"
    Given I have an account "Borca" "borca@soaguild.com"
    When I Sign In
    Then I should see "Borca"
    Then I should be logged in
#    And wait 2 seconds

#  @javascript
  Scenario: Activity Feed - Test for restricted access and member access
    When I go to "chat"
    Then the url should match "auth/login"
    Given I have an account "Borca" "borca@soaguild.com"
    When I Sign In
    Then I should see "Borca"
    Then I should be logged in
#    And wait 20 seconds

  Scenario: Live chat - Test for restricted access and member access
    When I go to "feeds"
    Then the url should match "auth/login"
    Given I have an account "Borca" "borca@soaguild.com"
    When I Sign In
    Then I should see "Borca"
    Then I should be logged in
#    And wait 2 seconds


  Scenario: Guild Conduct - restricted access
    When I go to "coc"
    Then the url should match "auth/login"
    Given I have an account "Borca" "borca@soaguild.com"
    When I Sign In
    Then I should see "Borca"
    Then I should be logged in
#    And wait 2 seconds



