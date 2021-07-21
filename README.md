# Real State Project

A basic real estate project Laravel that implements an ACL module.

## Tech Stack

* Laravel 8
* PHP 7.4
* SQL
* Javascript / Jquery 3.3.1
* HTML5
* CSS3
* Apache 2.4
* MariaDB 10.4
* Bootstrap 4.0

# Installation

1. Clone the repository from branch ```master```

2. Run the command line: ```composer update```.

3. Run the command line: ```npm install```.

4. Copy the ```.env.example``` file and rename it to ```.env``` and set your local data base parameters.

## Before run the migrations, comment the code snippet below in your ```App\Providers\AuthServiceProvider```

```
$permissions = Permission::with('roles')->get();
      
foreach($permissions as $permission) {
    Gate::define($permission->name, function(User $user) use ($permission) {
        return $user->hasPermission($permission);
    });
}

```
# After generate the migrations, uncomment the code snippet above.

5. Run the command line: ```artisan key:generate``` to generate the application key.

