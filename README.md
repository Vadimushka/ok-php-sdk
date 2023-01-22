# ok-php-sdk

PHP library for Ok API interaction, includes OAuth 2.0 authorization and API methods. Full Ok API features documentation can be found [here](https://apiok.ru/).

[![Packagist](https://img.shields.io/packagist/v/vadimushka/ok-php-sdk.svg)](https://packagist.org/packages/vadimushka/ok-php-sdk)

## 1. Prerequisites

* PHP 8.0 or later

## 2. Installation

The Ok PHP SDK can be installed using Composer by running the following command:

```shell
composer require vadimushka/ok-php-sdk
```

## 3. Initialization

Create OkApiClient object using the following code:

```php
$ok = new Client\OkApiClient($application_key, $app_secret_key);
```

## 4. Authorization 

The library provides the authorization flows for user based on OAuth 2.0 protocol implementation in apiok.ru. Please read the full [documentation](https://apiok.ru/ext/oauth/) before you start.

### 4.1. Server Authorization Code Flow

OAuth 2.0 Authorization Code Flow allows calling methods from the server side.

This flow includes two steps — obtaining an authorization code and exchanging the code for an access token. Primarily you should obtain the "code" ([manual user access](https://apiok.ru/ext/oauth/server)) by redirecting the user to the authorization page using the following method:

Create `OKOAuth` object first:

```php
$application_id = 123456789;
$redirect_uri = 'https://example.com/Ok';
$state = 'secret_state_code';
$browser_url = (new Vadimushka\OK\OAuth\OKOAuth)->getAuthorizeUrl(
    response_type: \Vadimushka\OK\OAuth\OkAuthResponseType::CODE,
    application_id: $application_id,
    scope: [
        \Vadimushka\OK\OAuth\OKAuthScope::VALUABLE_ACCESS, 
        \Vadimushka\OK\OAuth\OKAuthScope::LONG_ACCESS_TOKEN
    ],
    redirect_uri: $redirect_uri,
    state: $state,
    layout:  \Vadimushka\OK\OAuth\OKOAuth::W
);
```

After successful authorization user's browser will be redirected to the specified redirect_uri. Meanwhile the code will be sent as a GET parameter to the specified address:

```text
https://example.com?code=CODE
```
Then use this method to get the access token:

```php
$code = 'CODE';
$application_id = 123456789;
$client_secret = 'client_secret';
$redirect_uri = 'https://example.com/Ok';

$response = (new Vadimushka\OK\OAuth\OKOAuth)->getAccessToken(
    code: $code, 
    application_id: $application_id,
    client_secret: $client_secret,
    redirect_uri: $redirect_uri,
);
$access_token = $response->access_token;
```

The **redirect_uri** should be the URL that was used to get a code at the first step.

### 4.2. Client Authorization Code Flow

In difference with server authorization code flow this flow gives you temporary access key.

Read more about [user access key](https://apiok.ru/ext/oauth/client).

First step to get access using Implicit flow is creating OKOAuth object:

```php
$application_id = 123456789;
$redirect_uri = 'https://example.com/Ok';
$state = 'secret_state_code';
$browser_url = (new Vadimushka\OK\OAuth\OKOAuth)->getAuthorizeUrl(
    response_type: \Vadimushka\OK\OAuth\OkAuthResponseType::TOKEN,
    application_id: $application_id,
    scope: [
        \Vadimushka\OK\OAuth\OKAuthScope::VALUABLE_ACCESS, 
        \Vadimushka\OK\OAuth\OKAuthScope::LONG_ACCESS_TOKEN
    ],
    redirect_uri: $redirect_uri,
    state: $state,
    layout:  \Vadimushka\OK\OAuth\OKOAuth::W
);
```

Arguments are similar with server authorization code flow

After successful authorization user's browser will be redirected to the specified redirect_uri. Meanwhile, the access token will be sent as a fragment parameter to the specified address:

```text
https://example.com/#access_token={access_token}&session_secret_key={session_secret_key}&state={state}&permissions_granted={permissions_granted}&expires_in={expires_in}
```

**access_token** is your new access token.
**session_secret_key** is secret session key.
**expires_in** is lifetime of access token in seconds.
**permissions_granted** is rights granted by the user to the application.
**state** is string from authorize method.

## 5. API Requests

You can find the full list of OK API methods [here](https://apiok.ru/dev/methods/rest/).

### 5.1. Request sample

### 5.2. Uploading Photos into a Private Message

### 5.3. Uploading Video Files
