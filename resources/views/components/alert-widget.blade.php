@props(['type' => 'warning', 'dismissable' => true])

<div class="alert alert-{{ $type }} {{ $dismissable ? 'alert-dismissible fade show' : '' }}" role="alert">
    @if ($dismissable)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
    {{ $slot }}
</div>
