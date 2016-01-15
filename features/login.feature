Feature: Login
  I should be able to log in with username "user"
  and password "password".

  Scenario: Logging in with correct username & password #
    Given I have created an authentication object       #
    When I set the username as "user"                   #
    And I set the password as "password"                #
    And I submit the login request                      #
    Then I should see "Access granted."                 #

  Scenario: Logging in with incorrect username & password
    Given I have created an authentication object
    When I set the username as "user"
    And I set the password as "notpassword"
    And I submit the login request
    Then I should see "Access denied."
