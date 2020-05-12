<?php
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push(__('messages.home'), route('home.index'));
});


//Products

// Home > Products
Breadcrumbs::for('products', function ($trail) {
    $trail->parent('home');
    $trail->push(__('products.products'), route('product.index'));
});

// Home > Create products
Breadcrumbs::for('createProduct', function ($trail) {
    $trail->parent('home');
    $trail->push(__('products.createProduct'));
});

// Home > Products > [product name]
Breadcrumbs::for('product', function ($trail, $product) {
    $trail->parent('products');
    $trail->push($product->getName(), route('product.show', $product->getId()));
});

// Home > Products > [product name] > Comment
Breadcrumbs::for('comment', function ($trail, $product) {
    $trail->parent('product', $product);
    $trail->push(__('comments.comment'));
});

// Home > Products > [product name] > Show comments
Breadcrumbs::for('showComments', function ($trail, $product) {
    $trail->parent('product', $product);
    $trail->push(__('comments.viewComments'));
});

// Home > Products > [product name] > Edit
Breadcrumbs::for('editProduct', function ($trail, $product) {
    $trail->parent('product', $product);
    $trail->push(__('products.editProduct'));
});


//Receipts

// Home > Receipts
Breadcrumbs::for('receipts', function ($trail) {
    $trail->parent('home');
    $trail->push(__('receipts.receipts'), route('receipt.index'));
});

// Home > Receipts > [receipt id]
Breadcrumbs::for('receipt', function ($trail, $receipt) {
    $trail->parent('receipts');
    $trail->push($receipt->getId(), route('receipt.show', $receipt->getId()));
});


//ShoppingCart

// Home > ShoppingCart
Breadcrumbs::for('shoppingCart', function ($trail) {
    $trail->parent('home');
    $trail->push(__('shoppingCart.shoppingCart'), route('shoppingCart.index'));
});

// Home > ShoppingCart > Review order
Breadcrumbs::for('reviewOrder', function ($trail) {
    $trail->parent('shoppingCart');
    $trail->push(__('shoppingCart.reviewOrder'), route('shoppingCart.review'));
});

//Unitor Api

// Home > Unitor Api
Breadcrumbs::for('unitorApi', function ($trail) {
    $trail->parent('home');
    $trail->push(__('courses.api'), route('api.course.index'));
});

//My Account

// My Account
Breadcrumbs::for('myAccount', function ($trail, $user) {
    $trail->push(__('users.myAccount'), route('user.show', $user->getId()));
});

Breadcrumbs::for('editUser', function ($trail, $user) {
    $trail->parent('myAccount',  $user);
    $trail->push(__('users.editUser'), route('user.update', $user->getId()));
});

// My Account > Create Address
Breadcrumbs::for('createAddress', function ($trail, $user) {
    $trail->parent('myAccount',  $user);
    $trail->push(__('addresses.createAddress'), route('address.create', $user->getId()));
});

// My Account > View address
Breadcrumbs::for('viewAddress', function ($trail, $user) {
    $trail->parent('myAccount',  $user);
    $trail->push(__('addresses.viewAddress'), route('address.index', $user->getId()));
});

// My Account > View address > Edit
Breadcrumbs::for('editAddress', function ($trail, $user) {
    $trail->parent('viewAddress', $user);
    $trail->push(__('addresses.editAddress'));
});

//Users

// Home > Users
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('home');
    $trail->push(__('users.users'), route('admin.user.index'));
});

// Home > Users > [user name]
Breadcrumbs::for('user', function ($trail, $user) {
    $trail->parent('users');
    $trail->push($user->getName(), route('admin.user.show', $user->getId()));
});

// Home > Users > [user name] > Edit
Breadcrumbs::for('adminUserEdit', function ($trail, $user) {
    $trail->parent('user', $user);
    $trail->push(__('users.editUser'), route('admin.user.update', $user->getId()));
});

//Category

// Home > Categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('home');
    $trail->push(__('categories.categories'));
});

// Home > Create category
Breadcrumbs::for('createCategory', function ($trail) {
    $trail->parent('home');
    $trail->push(__('categories.createCategory'));
});