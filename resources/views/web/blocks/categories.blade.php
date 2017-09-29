<div class="col-sm-3">
  <div class="panel panel-primary">
    <div class="panel-heading">ALL CATEGORIES</div>
    <ul class="list-group">
      @if(count($categories))
        @foreach($categories as $category)
          <li class="list-group-item">{{$category->title}}</li>
        @endforeach
      @else
        <li class="list-group-item">There is no category to show.</li>
      @endif
    </ul>
  </div>
</div>
