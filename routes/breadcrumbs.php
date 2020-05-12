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


//Receipts

// Home > Receipts
Breadcrumbs::for('receipts', function ($trail) {
    $trail->parent('home');
    $trail->push(__('receipts.receipts'), route('receipt.index'));
});

// Home > Receipts > [receipt id]
Breadcrumbs::for('receipt', function ($trail, $receipt) {
    $trail->parent('receipts');
    $trail->push($receipt->getId(), route('receipt.show',$receipt->getId()));
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

