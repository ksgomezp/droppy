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
    ```
    class Example
    {
        # code...
    }
    ```
    As opposed to 
    ```
    class Example {
        # code...
    }
    ```
    
- Functions
    ```
    function functionName() 
    {
        # code...
    }
    ```
    As opposed to
    ```
    function functionName() {
        # code...
    }
    ```
   
- Ifs
    ```
    if (true) {
        # code...
    } else {
        # code...
    }
    ```
    As opposed to
    ```
    if (true) 
    {
        # code...
    }
    else
    {
        # code...
    }
    ```

- Fors
    ```
    for ($i = 0; $i < n; $i++) {
        # code...
    }
    ```
    As opposed to 
    ```
    for ($i = 0; $i < 3; $i++) 
    {
        # code...
    }
    ```
    
- Whiles
    ```
    while (true) {
        # code...
    }
    ```
    As opposed to
    ```
    while (true) {
        # code...
    }
    ```

## 4. Comments
- Single line comments **MUST** use the `#` syntax instead of `//`.
  ```
  # Proper comment
  // Not a good comment
  ```
- Multiline comments are to be written like
  ```
  /*
  * Multiple
  * lines of
  * comments
  */
  ```
  Instead of
  ```
  /* Very
  ugly
  comment
  */
  ```
