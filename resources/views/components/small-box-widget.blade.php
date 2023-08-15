@props(['icon', 'count', 'content', 'color','moreLink'])
<div class="small-box text-{{ $color }}">
    <div class="inner">
        <h3>{{ $count }}</h3>

        <p>{{ $content }}</p>
    </div>
    {!! $icon !!}
    <a href="{{ $moreLink }}" class="small-box-footer">
        More info <i class="bi bi-link-45deg"></i>
    </a>
</div>