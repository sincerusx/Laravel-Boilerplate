### Install via Composer
\\\composer require "codeception/codeception" --dev\\\
Execute it as `./vendor/bin/codecept`

### Setup
Execute:
\\\codecept bootstrap\\\
This creates configuration file **codeception.yml** and **tests** directory and default test suites. Acceptance, functional, unit test suites are created as well.

#### Simplified Setup
Use predefined installation templates for common use cases. Run them instead of `bootstrap` command.

#### Acceptance Testing (only)
\\\ codecept init acceptance \\\

#### REST API Testing (only)
\\\ codecept init api \\\

#### Unit Testing (only)
\\\ codecept init unit \\\

### Create Test
Generate your first acceptance test. Acceptance tests emulate behavior of a real user visiting your site.
\\\codecept generate:cest acceptance First\\\
Codeception scenario tests are called Cepts.

### Configure Acceptance Tests
Please make sure your local **development server** is running.  Put application URL into: **tests/acceptance.suite.yml**
\\\
actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: {YOUR APP'S URL}
        - \Helper\Acceptance
\\\

### Write a Basic Test
It's now time to write your first test. Edit the file we've just created **tests/acceptance/FirstCest.php**
```
<?php
class FirstCest 
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Home');  
    }
}
```
It will check that your frontpage contains the word **Home** in it.

### Run!
Tests are executed with 'run' command
\\\ codecept run --steps \\\
This will execute our Welcome test with **PhpBrowser**. It's PHP script that can check HTML page contents, click links, fill forms, and submit POST and GET requests. For more complex tests that require a browser use Selenium with **WebDriver** module.


## Acceptance Testing
Acceptance testing can be performed by a non-technical person. That person can be your tester, manager or even client. If you are developing a web-application (and you probably are) the tester needs nothing more than a web browser to check that your site works correctly. You can reproduce an acceptance tester’s actions in scenarios and run them automatically. Codeception keeps tests clean and simple as if they were recorded from the words of an actual acceptance tester.
 
 It makes no difference what (if any) CMS or framework is used on the site. You can even test sites created with different languages, like Java, .NET, etc. It’s always a good idea to add tests to your website. At least you will be sure that site features work after the latest changes were made.
 
 ### Sample Scenario
 
 Let’s say the first test you would want to run, would be signing in. In order to write such a test, we still require basic knowledge of PHP and HTML:
 ```
<?php
$I->amOnPage('/login');
$I->fillField('username', 'davert');
$I->fillField('password', 'qwerty');
$I->click('LOGIN');
$I->see('Welcome, Davert!');
```

http://codeception.com/docs/03-AcceptanceTests