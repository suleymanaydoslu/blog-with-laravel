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

@include('panel.blocks.validation_errors')
@include('panel.blocks.session_messages')

<div class="panel panel-primary">
  <div class="panel-heading"><i class="fa fa-list"></i> JOIN NEWSLETTER</div>
  <div class="panel-body">
    <form action="{{route('newsletter.post')}}" method="post">
      {{ csrf_field() }}

      <div class="col-sm-12">
        <div class="form-group">
          <label>Your Email Adress</label>
          <input class="form-control" name="email" required>
        </div>
      </div>

      <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send fa-fw"></i> JOIN</button>
  </div>
  </form>
</div>
