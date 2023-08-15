@if(Session::has('success'))
    <x-alertWidget type="success">
        <strong>Success!!</strong> {{ Session::get('success') }}
    </x-alertWidget>
@endif

@if(Session::has('message'))
    <x-alertWidget type="danger" dismissable="false">
        <strong>Error!!</strong> {{ Session::get('message') }}
    </x-alertWidget>
@endif

@if(Session::has('warning'))
    <x-alertWidget type="danger" dismissable="false">
        <strong>Warning!!</strong> {{ Session::get('message') }}
    </x-alertWidget>
@endif

@if($errors->any())

    <x-alertWidget type="danger" dismissable="false">
        <strong>Error!!</strong> {{ Session::get('message') }}
    </x-alertWidget>
@endif