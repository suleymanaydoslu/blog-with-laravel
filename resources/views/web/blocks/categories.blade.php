<div class="col-sm-3">
  <div class="panel panel-primary">
    <div class="panel-heading"><i class="fa fa-list"></i> ALL CATEGORIES</div>
    <ul class="list-group">
      @if(count($categories))
        @foreach($categories as $category)
          <li class="list-group-item"><a href="{{route('categoryDetail',$category->slug)}}">{{$category->title}}</a></li>
        @endforeach
      @else
        <li class="list-group-item">There is no category to show.</li>
      @endif
    </ul>
  </div>
</div>
