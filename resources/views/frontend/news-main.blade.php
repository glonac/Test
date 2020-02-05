<div class="row">
    @if($newsList!=null)
        @foreach($newsList as $item)
            <a href="{{route('news_show',$item->id)}}">{{$item->name}}</a>
            <br>
        @endforeach
    @endif
</div>
