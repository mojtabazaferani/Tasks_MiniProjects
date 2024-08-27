# TDD

By Default, Laravel Has Provided Developers With a Test Environment That Includes Two Sample Tests, For Which We Run The Following Command:

- vendor/bin/phpunit

## Organizing Tests:
One of The Recommended Methods, For The Test Folder Structure is to Use The Same App Folder Structure in This method, if You Plan to Create a Test Class For You Controllers, do it in The Following Way:

- tests/Feature/Http/Controllers/TddController.php

## Create Test:
We Create a New Test With The Following Command:

- php artisan make:test Http/Controllers/TddControllerTest

### Tip:
The Command Above Create 'Feature Test' (The Test We Are Going to Proceed With), Use The Following Command to Create a 'Unit Test':

- php artisan make:test Http/Controllers/AuthControllerTest  --unit

## Test Review:
Any PHP File in The 'Feature' And 'Unit' Folders That has The Word 'Test' at The End of it's Name is Automatically Executed by 'PHPUnit', To Change These settings, You Can Refer to The 'phpunit.xml' File.

### Attention:
You Can See The Default Code That is Created by Creating The Test in The Following Path:

- public/Scripts/Default-Test-Code

# First Test:
in The First Test, We Are Going to Make Sure That The 'Register' Page is Displayed by Referring to The url '/register', You Can See the First Test Codes in The Folllowing Path:

- public/Scripts/First-Test-Codes

Check The Test With The Following Command:

- vendor/bin/phpunit tests/Feature/Http/Controllers/TddControllerTest.php

# Second Test:
Now We Can Define The Test Related to Failed User Login, You Can See the Second Test Codes in The Folllowing Path:

- public/Scripts/Second-Test-Codes

Check The Test With The Following Command:

- vendor/bin/phpunit tests/Feature/Http/Controllers/TddControllerTest.php

# Third Test:
Now We Define The Test Related to Successful User, You Can See the Third Test Codes in The Folllowing Path:

- public/Scripts/Third-Test-Codes

Check The Test With The Following Command:

- vendor/bin/phpunit tests/Feature/Http/Controllers/TddControllerTest.php

## Delete Record After Each Test:
By 'Use RefreshDatabase' in Your test Class, Records Are Deleted With Each Test Run

