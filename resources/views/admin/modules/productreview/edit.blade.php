@extends('admin.layouts.layout')
@section('content')
<div class="content-wrapper p-4">
   <div class="content-card">
      <div class="card">
         @include('admin.layouts.CardHeader')
         <div class="card-body">
              <form class="cstm-form" method="post" action="{{route('product-review.update',base64_encode($ProductReviewData->_id))}}" name="page_update">
                @csrf
                @method('patch')
                <div class="form-group">
                  <label class="form-label">Posted By</label>
                  <input type="text" class="form-control @error('posted_by') is-invalid @enderror" placeholder="posted_by" name="posted_by" value="{{old('posted_by') ?? $ProductReviewData->posted_by}}">
                  @error('posted_by')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="form-label">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" value="{{old('title') ?? $ProductReviewData->title}}">
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="form-label">Review</label>
                  <textarea class="form-control @error('review') is-invalid @enderror" placeholder="Content" id="article-ckeditor" name="review">{{old('review') ?? $ProductReviewData->review}}</textarea>
                  @error('review')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <?php $selectedRating = old('rating') ?? $ProductReviewData->rating ?>
                  <label class="form-label">Rating</label>
                  <select class="form-control @error('rating') is-invalid @enderror" name="rating">
                    <option value="1" @if($selectedRating == 1){{'selected'}}@endif>Poor (1 Star)</option>
                    <option value="2" @if($selectedRating == 2){{'selected'}}@endif>Below Average (2 Stars)</option>
                    <option value="3" @if($selectedRating == 3){{'selected'}}@endif>Average (3 Stars)</option>
                    <option value="4" @if($selectedRating == 4){{'selected'}}@endif>Above Average (4 Stars)</option>
                    <option value="5" @if($selectedRating == 5){{'selected'}}@endif>Excellent (5 Stars)</option>
                  </select>
                  @error('rating')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label class="form-label">Status</label>
                  <label class="switch ">
                    <input type="checkbox" class="" value="1" name="active" @if($ProductReviewData->active == 1){{'checked'}}@endif>
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="btn-wrap">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
         </div>
      </div>
   </div>
</div>


@endsection
@section('js')
<script type="text/javascript">
  $(document).ready(function(){
  
      //  $('.table').DataTable();
  });
</script>
@endsection