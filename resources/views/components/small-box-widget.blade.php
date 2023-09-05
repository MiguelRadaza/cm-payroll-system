@props(['icon', 'count', 'content', 'color','moreLink'])

<section class="card card-featured-left card-featured-quaternary mb-4">
    <div class="card-body ">
        <div class="widget-summary">
            <div class="widget-summary-col widget-summary-col-icon">
                <div class="summary-icon bg-{{ $color }}">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="widget-summary-col">
                <div class="summary">
                    <h4 class="title">{{ $content }}</h4>
                    <div class="info">
                        <strong class="amount">{{ $count }}</strong>
                    </div>
                </div>
                <div class="summary-footer">
                    <a href="{{ $moreLink }}" class="text-uppercase">(view all)</a>
                </div>
            </div>
        </div>
    </div>
</section>