<?php


use App\Models\User;
use App\Http\Controllers\LoginController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/* in laravels auth middleware, if not authenticated it will try 
to redirect you to a route with a name of login */

Route::get('login', [LoginController::class, 'create'])->name('login');

Route::post('login', [LoginController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    });

    Route::get('/users', function () {
        // explicitly return just the users name which is visible to the client
        return Inertia::render('Users', [
            'users' => User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    // filter search results from query search
                    // % anything can come before of after search
                    // search STRING INTERPOLATION
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                // paginate the user results with the query string
                ->withQueryString()
                ->through(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name
                ]),
            'filters' => Request::only(['search'])
        ]);
    });


    Route::get('/users/create', function () {
        return Inertia::render('UsersCreate');
    });

    Route::post('/users', function () {
        // validate
        $attributes = Request::validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // persist
        User::create($attributes);
        // redirect

        return redirect('/users');
    });


    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

    Route::post('/logout', function () {
        dd('logging user out');
    });
});
