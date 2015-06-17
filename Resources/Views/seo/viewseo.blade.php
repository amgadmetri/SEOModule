@extends('app')
{!! \CMS::seo()->renderSeoById($seodata->id) !!}
@section('content')

<div class="container">
  <div class="col-sm-9">
    <a 
    class ="btn btn-default" 
    href  ='{{ url("admin/seo/create" ) }}' 
    role  ="button">
    Add SEO
  </a> 
  <div>
  <label for="id"><b>SEO ID: </b></label>
    {{ $seodata->id }}
    <br>
    <label for="title"><b>SEO title: </b></label>
    {{ $seodata->title }}
    <br>
    <label for="keywords"><b>SEO keywords: </b></label>
    {{ $seodata->keywords }}
    <br>
    <label for="author"><b>SEO author: </b></label>
    {{ $seodata->author }}
    <br>
    <label for="description"><b>SEO description: </b></label>
    {{ $seodata->description }}
    <br>
  </div>

</div>
</div>
@stop