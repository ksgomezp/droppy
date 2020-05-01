@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.success')}}</strong>
</div>
@endif
@if ($message = Session::get('add'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ __('messages.add')}}</strong>
</div>
@endif
