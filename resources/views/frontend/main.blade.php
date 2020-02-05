@extends('frontend.header')
@section('section-main')
    <? if($article){
        echo $article;
    }?>
@endsection
@extends('frontend.footer')
