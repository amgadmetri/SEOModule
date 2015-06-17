@extends('app')
@section('content')

<div class="container">
  <div class="col-sm-8">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if (Session::has('message'))
    <div class="alert alert-success">
      <ul>
        <li>{{ Session::get('message') }}</li>
      </ul>
    </div>
    @endif
            @if(\CMS::permissions()->can('show', 'LanguageContents') && $seo)
              <a 
              class ="btn btn-default" 
              href  ='{{ url("admin/language/languagecontents/show/seo/$seo->id") }}'
              role  ="button">
              Translations
              </a> 
            @endif
    <form method="post" id="seo_form">  
      <input name="_token" type="hidden" value="{{ csrf_token() }}">

      <div class="form-group">
        <label for="title">SEO title</label>
        <input 
        type             ="text" 
        class            ="form-control" 
        name             ="title" 
        @if($seo)
          value = "{{ $seo->data['title']  }}"
        @else
          value = "{{ old('title') }}"
        @endif
        placeholder      ="SEO title..." 
        aria-describedby ="sizing-addon2"
        >
      </div>

      <div class="form-group">
        <label for="keywords">SEO keywords: <i>Please write down the keywords seperated by "," comma </i></label>
        <input 
        type             ="text" 
        class            ="form-control" 
        name             ="keywords" 
        @if($seo)
          value = "{{ $seo->data['keywords']  }}"
        @else
          value = "{{ old('keywords') }}"
        @endif
        placeholder      ="SEO keywords .." 
        aria-describedby ="sizing-addon2"
        >
      </div>

      <div class="form-group">
        <label for="author">SEO author:</label>
        <input 
        type             ="text" 
        class            ="form-control" 
        name             ="author"  
        @if($seo)
          value = "{{ $seo->data['author']  }}"
        @else
          value = "{{ old('author') }}"
        @endif
        placeholder      ="Add author here .." 
        aria-describedby ="sizing-addon2"
        >
      </div>

      <div class="form-group">
        <label for="description">SEO Description</label>
        <input 
        type             ="text" 
        class            ="form-control" 
        name             ="description" 
        @if($seo)
          value = "{{ $seo->data['description']  }}"
        @else
          value = "{{ old('description') }}"
        @endif
        placeholder      ="SEO Description .." 
        aria-describedby ="sizing-addon2"
        >
      </div>

      <button type="submit" class="btn btn-primary form-control">Save SEO</button>
    </form>
  </div>  
</div>

@stop