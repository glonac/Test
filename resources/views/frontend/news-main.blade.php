@extends('frontend.header')
@section('section-main')
    <div class="container-fluid">
            <div class="news-header row">
                <span>Список новостей</span>
            </div>

<div class="row news-list-main-row justify-content-center">
    @if($newsList!=null)
        @foreach($newsList as $item)
            <div class="col-lg-8 col-md-8 col-sm-12 col-12 news-list-column">
                <a href="{{route('news_show',$item->id)}}">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                    </div>
                </div>
                </a>

            </div>
        @endforeach
    @endif
</div>
    @endsection
    </div>

