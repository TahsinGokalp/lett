<?php

return [

    /*
   |--------------------------------------------------------------------------
   | Server setting
   |--------------------------------------------------------------------------
   |
   | This setting allows you to change the server.
   |
   */

    'server' => env('L_SERVER', 'https://tahsingokalp.dev/api/log'),

    /*
    |--------------------------------------------------------------------------
    | Login key
    |--------------------------------------------------------------------------
    |
    | This is your authorization key which you get from your profile.
    |
    */

    'login_key' => env('LETT_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Project key
    |--------------------------------------------------------------------------
    |
    | This is your project key which you receive when creating a project
    |
    */

    'project_key' => env('LETT_PROJECT_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Environment setting
    |--------------------------------------------------------------------------
    |
    | This setting determines if the exception should be send over or not.
    |
    */

    'environments' => [
        'production',
    ],

    /*
    |--------------------------------------------------------------------------
    | Project version
    |--------------------------------------------------------------------------
    |
    | Set the project version, default: null.
    | For git repository: shell_exec("git log -1 --pretty=format:'%h' --abbrev-commit")
    |
    */
    'project_version' => null,

    /*
    |--------------------------------------------------------------------------
    | Lines near exception
    |--------------------------------------------------------------------------
    |
    | How many lines to show near exception line. The more you specify the bigger
    | the displayed code will be. Max value can be 50, will be defaulted to
    | 12 if higher than 50 automatically.
    |
    */

    'lines_count' => 12,

    /*
    |--------------------------------------------------------------------------
    | Prevent duplicates
    |--------------------------------------------------------------------------
    |
    | Set the sleep time between duplicate exceptions. This value is in seconds, default: 60 seconds (1 minute)
    |
    */

    'sleep' => 60,

    /*
    |--------------------------------------------------------------------------
    | Skip exceptions
    |--------------------------------------------------------------------------
    |
    | List of exceptions to skip sending.
    |
    */

    'except' => [
        'Symfony\Component\HttpKernel\Exception\NotFoundHttpException',
    ],

    /*
    |--------------------------------------------------------------------------
    | Key filtering
    |--------------------------------------------------------------------------
    |
    | Filter out these variables before sending them to LaraBug
    |
    */

    'blacklist' => [
        '*authorization*',
        '*password*',
        '*token*',
        '*auth*',
        '*verification*',
        '*credit_card*',
        'cardToken', // mollie card token
        '*cvv*',
        '*iban*',
        '*name*',
        '*email*',
    ],

    /*
    |--------------------------------------------------------------------------
    | Verify SSL setting
    |--------------------------------------------------------------------------
    |
    | Enables / disables the SSL verification when sending exceptions to LaraBug
    | Never turn SSL verification off on production instances
    |
    */
    'verify_ssl' => env('LETT_VERIFY_SSL', true),

    /*
    |--------------------------------------------------------------------------
    | Javascript settings
    |--------------------------------------------------------------------------
    |
    | This setting allows you to disable/enable javascript reporting.
    |
    */

    'javascript_reporting' => env('L_JAVASCRIPT_REPORTING', false),

];
