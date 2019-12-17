<?php


@foreach ($flux->channel->item as $flu)
    <article class="entry-item">
        <img src="{{utf8_decode((string)$flu->enclosure['url'])}}" alt="">
        <div class="entry-content">
            <a href="{{ $flu->item->link }}">{{ $flu->title }}</a>
            {{ $flu->description }}
        </div>
    </article>
@endforeach

var_dump($response);

?>
