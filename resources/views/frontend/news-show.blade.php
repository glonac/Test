@extends('frontend.header')
@section('section-main')
    <div class="container-fluid">
        <div class="news-header row">
            <span>{{$newsShow[0]->name}}</span>
        </div>
        <div class="row justify-content-center">
        @foreach($newsShow as $item)
            <div class="row mt-4 mb-4 ml-0 mr-0">
                <div class="col-md-3"></div>
                <div class="col-md-2">
                    <img src="https://pbs.twimg.com/media/DL8KHiLXcAEj6F4.jpg:large" style="width: 100%;height: 200px;">
                </div>
                <div class="col-md-3" style="font-weight: 600;font-size: 18px;">
                    {{$item->description}}
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="col-6 mt-4 mb-4 " style="word-break:break-all;">
                <span> {{$item->content}}</span>

            </div>

        @endforeach
        </div>
        <button class="mb-4 btn btn-dark" type="button">
            <a href="{{route('news-list')}}">
                Вернуться к списку новостей
            </a>
        </button>
    </div>
@endsection
