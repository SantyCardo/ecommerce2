@extends('admin.layouts.app')

@section('content')
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Edit product</h5>
    <a href="{{route('admin.products.index')}}" class="btn bg-gradient-dark">Back</a>
  </div>
  <div class="card-body">
    <form action="{{route('admin.products.update',$product)}}" method="post">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{$product->name}}" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4">{{$product->description}}</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" name="price" step="0.01" min="0" max="9999999999.99" class="form-control" value="{{$product->price}}" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Brand</label>
        <select name="brand_id" class="form-select" required>
          <option value="">Select brand</option>
          @foreach($brands as $b)
          <option value="{{$b->id}}" {{$product->brand_id==$b->id?'selected':''}}>{{$b->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select" required>
          <option value="">Select category</option>
          @foreach($categories as $c)
          <option value="{{$c->id}}" {{$product->category_id==$c->id?'selected':''}}>{{$c->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Image URL</label>
        <input type="text" name="url_image" class="form-control" value="{{$product->url_image}}">
      </div>
      <button type="submit" class="btn bg-gradient-success">Update</button>
    </form>
  </div>
</div>
@endsection