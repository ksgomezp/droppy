# Coding Rules

## 1. Models
- Validations **MUST** be made here and not in controller.
- Avoid triggering lazy loading when querying. If certain attribute information is needed, load it before hand.
  ```php
  // Good
  Product::with('comments')->get();
  
  // Bad. If comments are needed later in a view.
  Product::all();
  ```

## 2. Controllers
- **NEVER** use `echo` in a controller.
- Stick to default CRUD keywords (`index`, `create`, `store`, `show`, `edit`, `update`, `destroy`).
- Use the following guideline for controller names and routes.
  | Verb | URI | Action | Route Name |
  |------|-----|--------|------------|
  | GET | `/photos` | index | photos.index |
  | GET | `/photos/create` | create | photos.create |
  | POST | `/photos` | store | photos.store |
  | GET | `/photos/{photo}` | show | photos.show |
  | GET | `/photos/{photo}/edit` | edit | photos.edit |
  | PUT/PATCH | `/photos/{photo}` | update | photos.update |
  | DELETE | `/photos/{photo}` | destroy | photos.destroy |
  
  The use of PATCH is encouraged over PUT.
  
  Where `{photo}` matches the `id` of that record.
  
## 3. Views
- All views **MUST** be blade-based.
- All views **MUST** extend from the `layout.master` view.
- There **MUST NOT** be any PHP in a view.
- View files **MUST** use camelCase and be grouped in a directory.
  ```
  resources/
    views/
      openSource/
        index.blade.php
        create.blade.php
  ```
  
  ```php
  public function index()
  {
    return view('openSource.index');
  }
  
  public function create()
  {
    return view('openSource.create');
  }
  ```

## 4. Routes
- Every route **MUST** be linked to a controller. 
- All routes **MUST** use the following form.
  ```php
  Route::get('/', 'HomeController@index')->name('home.index');
  ```
- All routes **MUST** be named.
  ```php
  // Good
  Route::get('/', 'HomeController@index')->name('home.index');
  
  // Bad
  Route::get('/', 'HomeController@index');
  ```
- Route parameters and names **MUST** use camelCase.
  ```php
  Route::get('news/{newsItem}', 'NewsItemsController@index')->name('newsItem.index'); 
  
  ```
- A Route url **SHOULD NOT** start with `/` unless the url would be an empty string.
  ```php
  // Good
  Route::get('/', HomeController@index')->name('home.index');
  Route::get('open-source', 'OpenSourceController@index')->name('openSource.index');
  
  // Bad
  Route::get('', HomeController@index')->name('home.index');
  Route::get('/open-source', 'OpenSourceController@index')->name('openSource.index');
  ```
  
  
  
  
