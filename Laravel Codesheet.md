# Laravel Cheatsheet Codes
## Config
`Config::get('app.timezone');`

//get with Default value

`Config::get('app.timezone', 'UTC');`

//set Configuration

 `Config::set('database.default', 'sqlite');`
	
## Route
`Route::get('foo', function(){});`

`Route::get('foo', 'ControllerName@function');`

`Route::controller('foo', 'FooController');`

### RESTful Controllers 

`Route::resource('posts','PostsController');`

//Specify a subset of actions to handle on the route

`Route::resource('photo', 'PhotoController',['only' => ['index', 'show']]);`

`Route::resource('photo', 'PhotoController',['except' => ['update', 'destroy']]);`


### Triggering Errors
`App::abort(404);`
```
$handler->missing(...) in ErrorServiceProvider::boot();
throw new NotFoundHttpException;
```
              
### Route Parameters 
`Route::get('foo/{bar}', function($bar){});`

`Route::get('foo/{bar?}', function($bar = 'bar'){});`

### HTTP Verbs
`Route::any('foo', function(){});`

`Route::post('foo', function(){});`

`Route::put('foo', function(){});`

`Route::patch('foo', function(){});`

`Route::delete('foo', function(){});`


### RESTful actions

`Route::resource('foo', 'FooController');`

// Registering A Route For Multiple Verbs

`Route::match(['get', 'post'], '/', function(){});`

### Secure Routes(TBD)

`Route::get('foo', array('https', function(){}));`

### Route Constraints

```
Route::get('foo/{bar}', function($bar){})
->where('bar', '[0-9]+');
```

```
Route::get('foo/{bar}/{baz}', function($bar, $baz){})
->where
```

// Set a pattern to be used across routes

`Route::pattern('bar', '[0-9]+')`
              
HTTP Middleware 

// Assigning Middleware To Routes

`Route::get('admin/profile', ['middleware' => 'auth', function(){}]);`

### Named Routes

`Route::currentRouteName();`

`Route::get('foo/bar', array('as' => 'foobar', function(){}));`

```
Route::get('user/profile', [
  'as' => 'profile', 'uses' => 'UserController@showProfile'
]);
$url = route('profile');
$redirect = redirect()->route('profile');
```
              
### Route Prefixing

```
Route::group(['prefix' => 'admin'], function(){
  Route::get('users', function(){
      return 'Matches The "/admin/users" URL';
  });
});
```
              
### Route Namespacing

// This route group will carry the namespace 'Foo\Bar'

`Route::group(array('namespace' => 'Foo\Bar'), function(){})`
              
### Sub-Domain Routing

// {sub} will be passed to the closure

`Route::group(array('domain' => '{sub}.example.com'), function(){});`

### Environment 

`$environment = app()->environment();`

`$environment = App::environment();`

`$environment = $app->environment();`

// The environment is local

`if ($app->environment('local')){}`

// The environment is either local OR staging...

`if ($app->environment('local', 'staging')){}`

### Log

// The logger provides the seven logging levels defined in RFC 5424:
// debug, info, notice, warning, error, critical, and alert.
`Log::info('info');`

`Log::info('info',array('context'=>'additional info'));`

`Log::error('error');`

`Log::warning('warning');`

// get monolog instance

`Log::getMonolog();`

// add listener

`Log::listen(function($level, $message, $context) {});`

#### Query Logging 

// enable the log

`DB::connection()->enableQueryLog();`

// get an array of the executed queries

`DB::getQueryLog();`

## URL

`URL::full();`

`URL::current();`

`URL::previous();`

`URL::to('foo/bar', $parameters, $secure);`

`URL::action('NewsController@item', ['id'=>123]);`

// need be in appropriate namespace

`URL::action('Auth\AuthController@logout');`

`URL::action('FooController@method', $parameters, $absolute);`

`URL::route('foo', $parameters, $absolute);`

`URL::secure('foo/bar', $parameters);`

`URL::asset('css/foo.css', $secure);`

`URL::secureAsset('css/foo.css');`

`URL::isValidUrl('http://example.com');`

`URL::getRequest();`

`URL::setRequest($request);`

## Event 

`Event::fire('foo.bar', array($bar));`

// Register an event listener with the dispatcher.

// void listen(string|array $events, mixed $listener, int $priority)

`Event::listen('App\Events\UserSignup', function($bar){});`

`Event::listen('foo.*', function($bar){});`

`Event::listen('foo.bar', 'FooHandler', 10);`

`Event::listen('foo.bar', 'BarHandler', 5);`

// Stopping The Propagation Of An Event

// You may do so using by returning false from your handler.
`Event::listen('foor.bar', function($event){ return false; });`

`Event::subscribe('UserEventHandler');`

## Pagination 

// Auto-Magic Pagination

`Model::paginate(15);`

`Model::where('cars', 2)->paginate(15);`

// "Next" and "Previous" only

`Model::where('cars', 2)->simplePaginate(15);`

// Manual Paginator

`Paginator::make($items, $totalItems, $perPage);`

// Print page navigators in view

`$variable->links();`

## Lang

`App::setLocale('en');`

`Lang::get('messages.welcome');`

`Lang::get('messages.welcome', array('foo' => 'Bar'));`

`Lang::has('messages.welcome');`

`Lang::choice('messages.apples', 10);`

// Lang::get alias

`trans('messages.welcome');`

## File

`File::exists('path');`

`File::get('path');`

`File::getRemote('path');`

// Get a file's contents by requiring it

`File::getRequire('path');`

// Require the given file once

`File::requireOnce('path');`

// Write the contents of a file

`File::put('path', 'contents');`

// Append to a file

`File::append('path', 'data');`

// Delete the file at a given path

`File::delete('path');`

// Move a file to a new location

`File::move('path', 'target');`

// Copy a file to a new location

`File::copy('path', 'target');`

// Extract the file extension from a file path

`File::extension('path');`

// Get the file type of a given file

`File::type('path');`

// Get the file size of a given file

`File::size('path');`

// Get the file's last modification time

`File::lastModified('path');`

// Determine if the given path is a directory

`File::isDirectory('directory');`

// Determine if the given path is writable

`File::isWritable('path');`

// Determine if the given path is a file

`File::isFile('file');`

// Find path names matching a given pattern.

`File::glob($patterns, $flag);`

// Get an array of all files in a directory.

`File::files('directory');`

// Get all of the files from the given directory (recursive).

`File::allFiles('directory');`

// Get all of the directories within a given directory.

`File::directories('directory');`

// Create a directory

`File::makeDirectory('path',  $mode = 0777, $recursive = false);`

// Copy a directory from one location to another

`File::copyDirectory('directory', 'destination', $options = null);`

// Recursively delete a directory
`File::deleteDirectory('directory', $preserve = false);`


// Empty the specified directory of all files and folders

`File::cleanDirectory('directory');`

## SSH 

// Executing Commands

`SSH::run(array $commands);`

`SSH::into($remote)->run(array $commands);`

// specify remote, otherwise assumes default

```
SSH::run(array $commands, function($line){
  echo $line.PHP_EOL;
}); 
```

Tasks

// define

`SSH::define($taskName, array $commands);`


// execute

```
SSH::task($taskName, function($line){
  echo $line.PHP_EOL;
});
```
              

SFTP Uploads

`SSH::put($localFile, $remotePath);`

`SSH::putString($string, $remotePath);`

## Input 

`Input::get('key');`


// Default if the key is missing

`Input::get('key', 'default');`

`Input::has('key');`

`Input::all();`

// Only retrieve 'foo' and 'bar' when getting input

`Input::only('foo', 'bar');`

// Disregard 'foo' when getting input

`Input::except('foo');`

`Input::flush();`

Session Input (flash)

// Flash input to the session

`Input::flash();`

// Flash only some of the input to the session

`Input::flashOnly('foo', 'bar');`

// Flash only some of the input to the session

`Input::flashExcept('foo', 'baz');`

// Retrieve an old input item

`Input::old('key','default_value');`

// Files - Use a file that's been uploaded

`Input::file('filename');`

// Determine if a file was uploaded

`Input::hasFile('filename');`

// Access file properties

`Input::file('name')->getRealPath();`

`Input::file('name')->getClientOriginalName();`

`Input::file('name')->getClientOriginalExtension();`

`Input::file('name')->getSize();`

`Input::file('name')->getMimeType();`

// Move an uploaded file

`Input::file('name')->move($destinationPath);`

// Move an uploaded file

`Input::file('name')->move($destinationPath, $fileName);`

## Cache 

`Cache::put('key', 'value', $minutes);`

`Cache::add('key', 'value', $minutes);`

`Cache::forever('key', 'value');`

`Cache::remember('key', $minutes, function(){ return 'value' });`

`Cache::rememberForever('key', function(){ return 'value' });`

`Cache::forget('key');`

`Cache::has('key');`

`Cache::get('key');`

`Cache::get('key', 'default');`

`Cache::get('key', function(){ return 'default'; });`

`Cache::tags('my-tag')->put('key','value', $minutes);`

`Cache::tags('my-tag')->has('key');`

`Cache::tags('my-tag')->get('key');`

`Cache::tags('my-tag')->forget('key');`

`Cache::tags('my-tag')->flush();`

`Cache::increment('key');`

`Cache::increment('key', $amount);`

`Cache::decrement('key');`

`Cache::decrement('key', $amount);`

`Cache::section('group')->put('key', $value);`

`Cache::section('group')->get('key');`

`Cache::section('group')->flush();`

## Cookie 

`Cookie::get('key');`

`Cookie::get('key', 'default');`

// Create a cookie that lasts for ever

`Cookie::forever('key', 'value');`

// Create a cookie that lasts N minutes

`Cookie::make('key', 'value', 'minutes');`

// Set a cookie before a response has been created

`Cookie::queue('key', 'value', 'minutes');`

// Forget cookie

`Cookie::forget('key');`

// Send a cookie with a response

`$response = Response::make('Hello World');`

// Add a cookie to the response

`$response->withCookie(Cookie::make('name', 'value', $minutes));`

## Session 

`Session::get('key');`

// Returns an item from the session

`Session::get('key', 'default');`

`Session::get('key', function(){ return 'default'; });`

// Get the session ID

`Session::getId();`

// Put a key / value pair in the session

`Session::put('key', 'value');`

// Push a value into an array in the session

`Session::push('foo.bar','value');`

// Returns all items from the session

`Session::all();`

// Checks if an item is defined

`Session::has('key');`

// Remove an item from the session

`Session::forget('key');`

// Remove all of the items from the session

`Session::flush();`

// Generate a new session identifier

`Session::regenerate();`

// Flash a key / value pair to the session

`Session::flash('key', 'value');`

// Reflash all of the session flash data

`Session::reflash();`

// Reflash a subset of the current flash data

`Session::keep(array('key1', 'key2'));`

## Request 

// url: http://xx.com/aa/bb

`Request::url();`

// path: /aa/bb

`Request::path();`

// getRequestUri: /aa/bb/?c=d

`Request::getRequestUri();`

// Returns user's IP

`Request::getClientIp();`

// getUri: http://xx.com/aa/bb/?c=d

`Request::getUri();`

// getQueryString: c=d

`Request::getQueryString();`

// Get the port scheme of the request (e.g., 80, 443, etc.)

`Request::getPort();`

// Determine if the current request URI matches a pattern

`Request::is('foo/*');`

// Get a segment from the URI (1 based index)

`Request::segment(1);`

// Retrieve a header from the request

`Request::header('Content-Type');`

// Retrieve a server variable from the request

`Request::server('PATH_INFO');`

// Determine if the request is the result of an AJAX call

`Request::ajax();`


// Determine if the request is over HTTPS

`Request::secure();`

// Get the request method

`Request::method();`

// Checks if the request method is of specified type

`Request::isMethod('post');`

// Get raw POST data

`Request::instance()->getContent();`

// Get requested response format

`Request::format();`

// true if HTTP Content-Type header contains */json

`Request::isJson();`

// true if HTTP Accept header is application/json

`Request::wantsJson();`

## Response 

`return Response::make($contents);`

`return Response::make($contents, 200);`

`return Response::json(array('key' => 'value'));`

```
return Response::json(array('key' => 'value'))
->setCallback(Input::get('callback'));
```

`return Response::download($filepath);`

`return Response::download($filepath, $filename, $headers);`

// Create a response and modify a header value

```
$response = Response::make($contents, 200);
$response->header('Content-Type', 'application/json');
return $response;
```

// Attach a cookie to a response

```
return Response::make($content)
->withCookie(Cookie::make('key', 'value'));
```

## Redirect 

`return Redirect::to('foo/bar');`

`return Redirect::to('foo/bar')->with('key', 'value');`

`return Redirect::to('foo/bar')->withInput(Input::get());`

`return Redirect::to('foo/bar')->withInput(Input::except('password'));`

`return Redirect::to('foo/bar')->withErrors($validator);`

// Create a new redirect response to the previous location

`return Redirect::back();`

// Create a new redirect response to a named route

`return Redirect::route('foobar');`

`return Redirect::route('foobar', array('value'));`

`return Redirect::route('foobar', array('key' => 'value'));`

// Create a new redirect response to a controller action

`return Redirect::action('FooController@index');`

`return Redirect::action('FooController@baz', array('value'));`

`return Redirect::action('FooController@baz', array('key' => 'value'));`

// If intended redirect is not defined, defaults to foo/bar.

`return Redirect::intended('foo/bar');`

## Container 

`App::bind('foo', function($app){ return new Foo; });`

`App::make('foo');`

// If this class exists, it's returned

`App::make('FooBar');`

// Register a shared binding in the container

`App::singleton('foo', function(){ return new Foo; });`

// Register an existing instance as shared in the container

`App::instance('foo', new Foo);`

// Register a binding with the container

`App::bind('FooRepositoryInterface', 'BarRepository');`

// Register a service provider with the application

`App::register('FooServiceProvider');`

// Listen for object resolution

`App::resolving(function($object){});`

## Security

// Hashing 

`Hash::make('secretpassword');`

`Hash::check('secretpassword', $hashedPassword);`

`Hash::needsRehash($hashedPassword);`

// Encryption

`Crypt::encrypt('secretstring');`

`Crypt::decrypt($encryptedString);`

`Crypt::setMode('ctr');`

`Crypt::setCipher($cipher);`

## Mail

`Mail::send('email.view', $data, function($message){});`

`Mail::send(array('html.view', 'text.view'), $data, $callback);`

`Mail::queue('email.view', $data, function($message){});`

`Mail::queueOn('queue-name', 'email.view', $data, $callback);`

`Mail::later(5, 'email.view', $data, function($message){});`

// Write all email to logs instead of sending

`Mail::pretend();`

// Messages

// These can be used on the $message instance passed into Mail::send() or Mail::queue()

`$message->from('email@example.com', 'Mr. Example');`

`$message->sender('email@example.com', 'Mr. Example');`

`$message->returnPath('email@example.com');`

`$message->to('email@example.com', 'Mr. Example');`

`$message->cc('email@example.com', 'Mr. Example');`
`$message->bcc('email@example.com', 'Mr. Example');`

`$message->replyTo('email@example.com', 'Mr. Example');`

`$message->subject('Welcome to the Jungle');`

`$message->priority(2);`

`$message->attach('foo\bar.txt', $options);`

// This uses in-memory data as attachments

`$message->attachData('bar', 'Data Name', $options);`

// Embed a file in the message and get the CID

`$message->embed('foo\bar.txt');`

`$message->embedData('foo', 'Data Name', $options);`

// Get the underlying Swift Message instance

`$message->getSwiftMessage();`

## Queue 

`Queue::push('SendMail', array('message' => $message));`

`Queue::push('SendEmail@send', array('message' => $message));`

`Queue::push(function($job) use $id {});`

// Same payload to multiple workers

`Queue::bulk(array('SendEmail', 'NotifyUser'), $payload);`

// Starting the queue listener

`php artisan queue:listen`

`php artisan queue:listen connection`

`php artisan queue:listen --timeout=60`

// Process only the first job on the queue

`php artisan queue:work`

// Start a queue worker in daemon mode

`php artisan queue:work --daemon`

// Create migration file for failed jobs

`php artisan queue:failed-table`

// Listing failed jobs

`php artisan queue:failed`

// Delete failed job by id

`php artisan queue:forget 5`

// Delete all failed jobs

`php artisan queue:flush`

## View 

`View::make('path/to/view');`

`View::make('foo/bar')->with('key', 'value');`

`View::make('foo/bar')->withKey('value');`

`View::make('foo/bar', array('key' => 'value'));`

`View::exists('foo/bar');`

// Share a value across all views

`View::share('key', 'value');`

// Nesting views

`View::make('foo/bar')->nest('name', 'foo/baz', $data);`

// Register a view composer

`View::composer('viewname', function($view){});`

//Register multiple views to a composer

`View::composer(array('view1', 'view2'), function($view){});`

// Register a composer class

`View::composer('viewname', 'FooComposer');`

`View::creator('viewname', function($view){});`

#Laravel/Cheatsheet