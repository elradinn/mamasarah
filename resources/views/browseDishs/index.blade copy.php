@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="col-12"><input id="searchbar_toggle" type="checkbox" />
        <table class="table table-sm table-striped table-hover">
          <thead>
            <tr>
              <th class="@getSortClass(BrowseDish.image) d-none d-md-table-cell"><a
                  href="@getLink(sort,browseDishs,BrowseDish.image)">Image</a></th>
              <th class="@getSortClass(BrowseDish.name)"><a href="@getLink(sort,browseDishs,BrowseDish.name)">Name</a>
              </th>
              <th class="@getSortClass(BrowseDish.price)"><a
                  href="@getLink(sort,browseDishs,BrowseDish.price)">Price</a></th>
              <th class="@getSortClass(Category.name,asc)"><a
                  href="@getLink(sort,browseDishs,Category.name,asc)">Category</a></th>
              <th class="@getSortClass(BrowseDish.description)"><a
                  href="@getLink(sort,browseDishs,BrowseDish.description)">Description</a></th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($browseDishs as $browseDish)
            <tr>
              <td class="d-none d-md-table-cell text-center">@if ($browseDish->image) <a
                  href="/storage/dishs/{{$browseDish->image}}" target="_blank" title="{{$browseDish->image}}"><img
                    class="img-list" src="/storage/dishs/{{$browseDish->image}}" /></a> @endif</td>
              <td>{{$browseDish->name}}</td>
              <td class="text-right">{{$browseDish->price}}</td>
              <td>{{$browseDish->category_name}}</td>
              <td>{{$browseDish->description}}</td>
              <td class="text-center">
                <form action="{{ route('cart.add') }}" method="POST">
                  @csrf
                  <input type="hidden" name="dish_id" value="{{$browseDish->id}}" />
                  <button class="btn btn-sm btn-success" type="submit">Add to Cart</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row mb-1">
          <div class="col-md-3 col-6">
            <label>Show
              <select id="page_size" onchange="location = this.value">
                <option value="@getLink(size,browseDishs,10)" {{request()->input('size') == '10' ? 'selected' : ''}}>10
                </option>
                <option value="@getLink(size,browseDishs,20)" {{request()->input('size') == '20' ? 'selected' : ''}}>20
                </option>
                <option value="@getLink(size,browseDishs,30)" {{request()->input('size') == '30' ? 'selected' : ''}}>30
                </option>
              </select>
              entries
            </label>
          </div>
          <div class="col-md-9 col-6">
            <div class="float-right d-none d-md-block">
              <ul class="pagination flex-wrap">
                <li class="page-item{{$browseDishs->currentPage() <= 1 ? ' disabled' : ''}}"><a class="page-link"
                    href="@getLink(page,browseDishs,$browseDishs->currentPage()-1)">Prev</a></li>
                @for ($page = 1; $page <= $browseDishs->lastPage(); $page++)
                  <li class="page-item{{$browseDishs->currentPage() == $page ? ' active' : ''}}"><a class="page-link"
                      href="@getLink(page,browseDishs,$page)">{{$page}}</a></li>
                  @endfor
                  <li class="page-item{{$browseDishs->currentPage() >= $browseDishs->lastPage() ? ' disabled' : ''}}"><a
                      class="page-link" href="@getLink(page,browseDishs,$browseDishs->currentPage()+1)">Next</a></li>
              </ul>
            </div>
            <div class="float-right d-block d-md-none">
              <label> Page
                <select id="page_index" onchange="location = this.value">
                  @for ($page = 1; $page <= $browseDishs->lastPage(); $page++)
                    <option value="@getLink(page,browseDishs,$page)"
                      {{$browseDishs->currentPage() == $page ? 'selected' : ''}}>{{$page}}</option>
                    @endfor
                </select>
              </label> of <span>{{$browseDishs->lastPage()}}</span>
              <div class="btn-group">
                <a class="btn btn-success btn-sm{{$browseDishs->currentPage() <= 1 ? ' disabled' : ''}}"
                  href="@getLink(page,browseDishs,$browseDishs->currentPage()-1)"><i class="fa fa-chevron-left"></i></a>
                <a class="btn btn-success btn-sm{{$browseDishs->currentPage() >= $browseDishs->lastPage() ? ' disabled' : ''}}"
                  href="@getLink(page,browseDishs,$browseDishs->currentPage()+1)"><i
                    class="fa fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <style>
      #searchbar_toggle_menu {
        display: inline-flex !important
      }
      </style>
    </div>
  </div>
</div>
<script>
initPage()
</script>
@endsection