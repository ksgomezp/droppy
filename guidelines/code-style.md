# Coding Style

## 1. Naming
- Class names **MUST** be declared using Pascal Case and in the singular form. `MyClass`.
- Methods, variables, parameters, arguments and attributes names **MUST** all be declared using Camel Case. `myIdentifier`.
- Constants **MUST** be declared in all upper case with underscore separators. `MY_CONSTANT`.

## 2. Files
- All `.php` files **MUST** use the `<?php` tag at the beginning of the file and **NO** `?>` at the end.
- If a `.php` file contains a class declaration it is to be named **EXACTLY** as the class is.
- There **MUST NOT** be more than one class declared per file.
- After the `<?php` tag the following order is to be used:
    - `namespace` statements.
    - `use` statements.
    - `class` declaration.

## 3. Formatting
- Classes
    ```php
    // Good
    class ClassName
    {
        ...
    }
    
    // Bad
    class ClassName {
        ...
    }
    ```
    
- Functions
    ```php
    // Good
    function functionName() 
    {
        ...
    }
    
    // Bad
    function functionName() {
        ...
    }
    ```
   
- Ifs
    
    ```php
    // Good
    if ($condition) {
        ...
    } else {
        ...
    }
    
    // Bad
    if ($condition) 
    {
        ...
    }
    else
    {
        ...
    }

    // Bad
    if ($condition) ...
    ```
    
- Fors
    ```php
    // Good
    for ($i = 0; $i < n; $i++) {
        ...
    }
    
    // Bad
    for ($i = 0; $i < n; $i++) 
    {
        ...
    }
    ```
    
- Whiles
  ```php
  // Good
  while (true) {
      ...
  }

  // Bad
  while (true) {
      ...
  }
  ```

## 4. Comments
Avoid using comments as much as possible. If truly needed use like them like this.
```php
// There should be a space before a single line comment.

/*
* If you need to explain a lot you can use a comment block. Notice the
* single * on the first line. Comment blocks don't need to be three
* lines long or three characters shorter than the previous line.
*/
```
