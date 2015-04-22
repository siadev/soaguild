Feature: Membership
  In order to give registered members access to exclusive content
  As an administrator
  I need authentication and registration for users

#  @javascript
  Scenario: Registration
    When I register "Borca" "borca@soaguild.com"
    Then I should have an account

#  @javascript
  Scenario: Successful Authentication
    Given I have an account "Borca" "borca@soaguil.com"
    When I Sign In
    Then I should be logged in

#  @javascript
  Scenario: Failed Authentication
    When I sign in with invalid credentials
    Then I should not be logged in


