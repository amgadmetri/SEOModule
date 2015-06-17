@extends('app')
{!! \CMS::seo()->renderSeoByType('content') !!}
@section('content')

<div class="container">
  <div class="col-sm-9">
              <a 
              class ="btn btn-default" 
              href  ='{{ url("admin/seo/create/$itemType/$item_id" ) }}' 
              role  ="button">
              Add SEO
              </a> 

    <table class="table table-striped">
      <thead>
        <tr>
          <th>SEO ID</th>
          <th>SEO title</th>
          <th>SEO keywords</th>
          <th>SEO author</th>
          <th>SEO description</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        @foreach($seos as $seo)
        <tr>
          <th>{{ $seo->id }}</th>
          <th>{{ $seo->title}}</th>
          <th>{{ $seo->keywords }}</th>
          <th>{{ $seo->author }}</th>
          <th>{{ $seo->description }}</th>
          <th>
          @if(\CMS::permissions()->can('edit', 'Seo'))
                <a class="btn btn-default" href='{{ url("admin/seo/edit/$seo->id") }}' role="button">Edit</a>
          @endif

          @if(\CMS::permissions()->can('delete', 'Seo'))
                <a class="btn btn-default" href='{{ url("admin/seo/delete/$seo->id") }}' role="button">Delete</a>
          @endif

          @if(\CMS::permissions()->can('show', 'Seo'))
                <a class="btn btn-default" href='{{ url("admin/seo/seoshow/$seo->id") }}' role="button">show</a>
          @endif
          </th>
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</div>
@stop