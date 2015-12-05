# api.filmap

**Table of Contents**  *generated with [DocToc](http://doctoc.herokuapp.com/)*

- [Authenticate: [ POST ] /authenticate](#authenticate)
- [Geo calls](#geocalls)
	- [get near films: [GET] /near/{distance},{lat},{lng}](#near)
- [User-related calls](#userrelated)
	- [get all users: [ GET ] /user](#getallusers)
	- [create new user: [ POST ] /user](#createuser)
	- [get user: [ GET ] /user/{ id }](#getuser)
	- [update user: [ PUT ] /user/{ id }](#updateuser)
- [Film-related calls](#filmrelated)
	- [get all films for the authenticated user: [ GET ] /films](#getallfilms)
	- [save film: [ POST ] /films](#savefilm)
	- [Get specific film: [ GET ] /films/{id}](#getfilm)
	- [Delete specific film: [ DELETE ] /films/{id}](#deletefilm)
	- [Mark film as watched: [ POST ] /films/{id}/watch](#watchfilm)
- [Responses](#responses)
	- [Errors](#errors)
	- [Success](#success)


## <a name="authenticate"></a> Authenticate: [ POST ] /authenticate
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

## <a name="geocalls"></a> Geo calls

### <a name="near"></a> get near films: [GET] /near/{distance},{lat},{lng}

Onde:

* **distance**: distance in KM
* **lat** `<integer>`: latitude
* **lng** `<integer>`: longitude


O retorno será uma lista de filmes em um raio de `distance` KM:

	[
		{
			"omdb":,
			"lat":,
			"lng":,
			"distance":
		},
		{
			"omdb":,
			"lat":,
			"lng":,
			"distance":
		},
		...
	]

Exemplo:

	POST: /near/50,37,-122

Retorno:

	[
		{
			"omdb":20,
			"lat":37.38714,
			"lng":-122.079354,
			"distance":43.618078982077
		},
		{
			"omdb":7,
			"lat":37.393885,
			"lng":-122.078916,
			"distance":44.352270483297
			},
		{
			"omdb":2,
			"lat":37.394011,
			"lng":-122.095528,
			"distance":44.621582141654
		},
		{
			"omdb":9,
			"lat":37.402653,
			"lng":-122.079354,
			"distance":45.321241097259
		},
		{
			"omdb":7,
			"lat":37.401724,
			"lng":-122.114646,
			"distance":45.809211542246
		}
	]

## <a name="userrelated"></a> User-related calls

### <a name="getallusers"></a> get all users: [ GET ] /user
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

### <a name="createuser"></a> create new user: [ POST ] /user
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

### <a name="getuser"></a> get user: [ GET ] /user/{ id }

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

### <a name="updateuser"></a>update user: [ PUT ] /user/{ id }

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

## <a name="filmrelated"></a>Film-related calls

### <a name="getallfilms"></a> get all films for the authenticated user: [ GET ] /films

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

### <a name="savefilm"></a>save film: [ POST ] /films

Send a POST request with:

	"omdb":,
	"watched":,
	"lat":,
	"lng":

Note: **lat** and **lng** are optional inputs.

### <a name="getfilm"></a>Get specific film: [ GET ] /films/{id}

Response format:

    {
	    "id":,
	    "omdb":,
	    "watched":,
	    
	    "response":true
    }


### <a name="deletefilm"></a>Delete specific film: [ DELETE ] /films/{id}

### <a name="watchfilm"></a>Mark film as watched: [ POST ] /films/{id}/watch


## <a name="responses"></a>Responses

### <a name="errors"></a>Errors

Caso ocorra erro, o formato será:

    {
	    "response": false,
	    "error": <error description>,
    }

### <a name="success"></a>Success

* `POST requests` will always return `HTTP 200` to indicate that the operation was successful.

* `GET requests` will include a `"response": true` within the `JSON response`.



