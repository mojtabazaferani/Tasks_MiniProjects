## Description
In This Section, We're Just Going to Go Over The Database Driver.

## Step 1:
The First Thing You Should Do is to Create Your Table For This, Run The Following Commands:

- php artisan queue:table
- php artisan queue:failed-table
- php artisan migrate

### Tip:
if The 'failed-job' Table Was Available, There is no Need to Execute The Command (php artisan queue:failed-table).

## Step 2:
Now, Create a Job With The Following Command:

- php artisan make:job |jobName|

After Executing The Above Command, a Job Will be Created in app/jobs path, Whose Default Code Can be Seen in the 'Scripts' Folder Named 'job-default'.

## Step 3:
Enter The Codes of The 'Scripts' Folder in The 'job' File Into The 'handle()' Method of The job class.

# Putting Jobs in Queue:
To Put The Job in The Queue, it is Enough to Call The 'dispatch()' Method of The Codes of The 'Scripts/code' Path Into Your Controller.

## How to Work?:
Every time The Codes is Executed, a Job Enters The Queue And a Record is Created in The 'jobs' Table

### Tip:
if, After Doing All The Above Explanations, nothing Happens in The database, Enter '.env' File And Make The Following Settings:

- QUEUE_CONNECTION=database

# Execution of The Queue:
Enter The Following Command to Run The Queue:

- php artisan queue:work
