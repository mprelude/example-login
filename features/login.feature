Feature: Login
  I should be able to log in with username "user"
  and password "password".

  Scenario: Logging in with correct username & password
    Given I have created an authentication object
    When I set the username as "user"
      And I set the password as "password"
      And I submit the login request
    Then I should see "Access granted."

  Scenario: Logging in with incorrect username & password
    Given I have created an authentication object
    When I set the username as "user"
      And I set the password as "notpassword"
      And I submit the login request
    Then I should see "Access denied."

  Scenario: Logging in via web with correct username & password
    Given I am on "/index.php"
    When I fill in "username" with "user"
      And I fill in "password" with "password"
      And I press "submitLogin"
    Then the "message" div should say "Access granted."

  Scenario: Logging in via web with incorrect username & password
    Given I am on "/index.php"
    When I fill in "username" with "user"
      And I fill in "password" with "notpassword"
      And I press "submitLogin"
    Then the "message" div should say "Access denied."

  Scenario: Logging in via web without providing username & password
    Given I am on "/index.php"
    When I fill in "username" with ""
      And I fill in "password" with ""
      And I press "submitLogin"
    Then the "message" div should say "Please enter username &amp; password."
