@extends('admin.layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Products List</h5>
      <a href="{{route('admin.products.create')}}" class="btn bg-gradient-success">Add new product</a>
    </div>
    <form method="get" class="mt-3">
      <div class="row g-2">
        <div class="col-md-4">
          <input type="text" name="q" value="{{request('q')}}" class="form-control" placeholder="Search by name">
        </div>
        <div class="col-md-3">
          <select name="brand_id" class="form-select">
            <option value="">All brands</option>
            @foreach($brands as $b)
              <option value="{{$b->id}}" {{request('brand_id')==$b->id?'selected':''}}>{{$b->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-3">
          <select name="category_id" class="form-select">
            <option value="">All categories</option>
            @foreach($categories as $c)
              <option value="{{$c->id}}" {{request('category_id')==$c->id?'selected':''}}>{{$c->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2 d-flex gap-2">
          <button class="btn bg-gradient-dark w-100" type="submit">Filter</button>
          <a href="{{route('admin.products.index')}}" class="btn btn-outline-secondary">Reset</a>
        </div>
      </div>
    </form>
  </div>
  <div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive">
      <table class="table align-items-center mb-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $p)
          <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->name}}</td>
            <td>${{number_format($p->price,2)}}</td>
            <td>{{$p->brand?->name}}</td>
            <td>{{$p->category?->name}}</td>
            <td>{{$p->created_at}}</td>
            <td>{{$p->updated_at}}</td>
            <td class="text-end">
              <a href="{{route('admin.products.edit',$p)}}" class="text-primary">Editar</a>
              <form action="{{route('admin.products.destroy',$p)}}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link text-danger p-0">Eliminar</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="px-3">{{$products->links()}}</div>
  </div>
  <div class="card-footer px-3">Showing {{$products->firstItem()}} to {{$products->lastItem()}} of {{$products->total()}} results</div>
  </div>
@endsection