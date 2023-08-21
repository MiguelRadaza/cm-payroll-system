@if(Session::has('success'))
    <x-alert-widget type="success">
        <strong>Success!!</strong> {{ Session::get('success') }}
    </x-alert-widget>
@endif

@if(Session::has('message'))
    <x-alert-widget type="danger" dismissable="false">
        <strong>Error!!</strong> {{ Session::get('message') }}
    </x-alert-widget>
@endif

@if(Session::has('warning'))
    <x-alert-widget type="warning" dismissable="false">
        <strong>Warning!!</strong> {{ Session::get('warning') }}
    </x-alert-widget>
@endif

@if($errors->any())

    <x-alert-widget type="danger" dismissable="false">
        <strong>Error!!</strong> {{ Session::get('message') }}
    </x-alert-widget>
@endif