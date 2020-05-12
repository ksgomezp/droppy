@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.success') }}</strong>
</div>
@endif

@if ($message = Session::get('add'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.add') }}</strong>
</div>
@endif

@if ($message = Session::get('delete'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.delete') }}</strong>
</div>
@endif

@if ($message = Session::get('remove'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.remove') }}</strong>
</div>
@endif

@if ($message = Session::get('update'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.update') }}</strong>
</div>
@endif

@if ($message = Session::get('successfulPurchase'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.successfulPurchase') }}</strong>
</div>
@endif

@if ($message = Session::get('paymentError'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.paymentError') }}</strong>
</div>
@endif

@if ($message = Session::get('notSales'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.notSales') }}</strong>
</div>
@endif

@if ($message = Session::get('notComments'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.notComments') }}</strong>
</div>
@endif



