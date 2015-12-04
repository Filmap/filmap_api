# api.filmap

## Authenticate: [ POST ] /authenticate
Propósito: get auth token

Send a POST request with: 

    'email' = ,
    'password' = ,

Response format:

	{
		"token": xxxxxx,
	}

Salve a token para demais requisições.

Ao realizar **User-related** calls e **Film-related** calls adicione a seguinte Header:

	Authorization: Bearer [token]


## User-related calls

###get all users: [ GET ] /user
Propósito: get all users
Response format:

    [
    	{
    		"id":,
    		"name":,
    		"email":,
    		"created_at":,
    		"updated_at":
    	},
    	{
    		"id":,
    		"name":,
    		"email":,
    		"created_at":,
    		"updated_at":
    	},
    	...
    	,
    	{"response":true}
    ]

Onde:

**id**: id do usuário
**name**: nome do usuário
**email**: e-mail do usuário

### create new user: [ POST ] /user
Send a **post** request with:

    'name' = ,
    'email' = ,
    'password' = ,
    'password_confirmation' =,


Onde:

**name**: nome do usuário
**email**: e-mail do usuário
**password**: senha
**password_confirmation**: mesma senha para confirmação

### get user: [ GET ] /user/{ id }

Response format:

    {
	    "id":,
	    "name":,
	    "email":,
	    "created_at":,
	    "updated_at":,
	    
	    "response":true
    }

Onde:

**id**: id do usuário
**name**: nome do usuário
**email**: e-mail do usuário

### update user: [ PUT ] /user/{ id }

To update a user send a **put** request with (optional):

    'name' = ,
    'email' = ,
    'password' = ,
    'password_confirmation' =,


Onde:

**name**: nome do usuário
**email**: e-mail do usuário
**password**: senha
**password_confirmation**: mesma senha para confirmação

## Film-related calls

###get all films for the authenticated user: [ GET ] /films

Response format:

    [
    	{
    		"id":,
    		"omdb":,
    		"user_id":,
    		"watched":,
    		"created_at":,
    		"updated_at":
    	},
    	{
    		"id":,
    		"omdb":,
    		"user_id":,
    		"watched":,
    		"created_at":,
    		"updated_at":
    	},
    	...
    	,
    	{"response":true}
    ]

### save film: [ POST ] /films

Send a POST request with:

	"omdb":,
	"watched":,
	"lat":,
	"lng":

Note: **lat** and **lng** are optional inputs.

### Get specific film: [ GET ] /films/{id}

Response format:

    {
	    "id":,
	    "omdb":,
	    "watched":,
	    
	    "response":true
    }


### Delete specific film: [ DELETE ] /films/{id}

### Mark film as watched: [ POST ] /films/{id}/watch


## Responses

### Errors

Caso ocorra erro, o formato será:

    {
	    "response": false,
	    "error": <error description>,
    }

### Success

* `POST requests` will always return `HTTP 200` to indicate that the operation was successful.

* `GET requests` will include a `"response": true` within the `JSON response`.




