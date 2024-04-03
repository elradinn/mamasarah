@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="col-12">
        <div id="searchbar" class="form-row mb-4">
          <input type="hidden" id="search_col" value="Dish.search">
          <input type="hidden" id="search_oper" value="c">
          <div class="form-group col">
            <input id="search_word" autocomplete="off" onkeyup="search(event)" value="{{request()->input('sw')}}"
              class="form-control form-control-sm" placeholder="Search dishes ..."/>
          </div>
          <div class="col">
            <button class="btn btn-success btn-sm" onclick="search()">Search</button>
            <button class="btn btn-secondary btn-sm" onclick="clearSearch()">Clear</button>
          </div>
          <div class="col d-flex justify-content-end align-items-baseline">
            <a class="btn btn-sm btn-success" href="/dishs/create">Create</a>
          </div>
        </div>
        <table class="table table-sm table-striped table-hover">
          <thead>
            <tr>
              <th class="@getSortClass(Dish.image) d-none d-md-table-cell"><a
                  href="@getLink(sort,dishs,Dish.image)">Image</a></th>
              <th class="@getSortClass(Dish.name)"><a href="@getLink(sort,dishs,Dish.name)">Name</a></th>
              <th class="@getSortClass(Dish.price)"><a href="@getLink(sort,dishs,Dish.price)">Price</a></th>
              <th class="@getSortClass(Category.name,asc)"><a href="@getLink(sort,dishs,Category.name,asc)">Category</a>
              </th>
              <th class="@getSortClass(Dish.description) d-none d-md-table-cell"><a
                  href="@getLink(sort,dishs,Dish.description)">Description</a></th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dishs as $dish)
            <tr>
              <td class="d-none d-md-table-cell text-center">@if ($dish->image) <a
                  href="/storage/dishs/{{$dish->image}}" target="_blank" title="{{$dish->image}}"><img class="img-list"
                    src="/storage/dishs/{{$dish->image}}" /></a> @endif</td>
              <td>{{$dish->name}}</td>
              <td class="text-right">{{$dish->price}}</td>
              <td>{{$dish->category_name}}</td>
              <td class="d-none d-md-table-cell">{{$dish->description}}</td>
              <td class="text-center">
                <a class="btn btn-sm btn-secondary" href="/dishs/{{$dish->id}}" title="View"><i
                    class="fa fa-eye"></i></a>
                <a class="btn btn-sm btn-success" href="/dishs/{{$dish->id}}/edit" title="Edit"><i
                    class="fa fa-pencil"></i></a>
                <form action="/dishs/{{$dish->id}}" method="POST">
                  @method("DELETE")
                  @csrf
                  <a class="btn btn-sm btn-danger" href="#!" onclick="deleteItem(this)" title="Delete"><i
                      class="fa fa-times"></i></a>
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
                <option value="@getLink(size,dishs,10)" {{request()->input('size') == '10' ? 'selected' : ''}}>10
                </option>
                <option value="@getLink(size,dishs,20)" {{request()->input('size') == '20' ? 'selected' : ''}}>20
                </option>
                <option value="@getLink(size,dishs,30)" {{request()->input('size') == '30' ? 'selected' : ''}}>30
                </option>
              </select>
              entries
            </label>
          </div>
          <div class="col-md-9 col-6">
            <div class="float-right d-none d-md-block">
              <ul class="pagination flex-wrap">
                <li class="page-item{{$dishs->currentPage() <= 1 ? ' disabled' : ''}}"><a class="page-link"
                    href="@getLink(page,dishs,$dishs->currentPage()-1)">Prev</a></li>
                @for ($page = 1; $page <= $dishs->lastPage(); $page++)
                  <li class="page-item{{$dishs->currentPage() == $page ? ' active' : ''}}"><a class="page-link"
                      href="@getLink(page,dishs,$page)">{{$page}}</a></li>
                  @endfor
                  <li class="page-item{{$dishs->currentPage() >= $dishs->lastPage() ? ' disabled' : ''}}"><a
                      class="page-link" href="@getLink(page,dishs,$dishs->currentPage()+1)">Next</a></li>
              </ul>
            </div>
            <div class="float-right d-block d-md-none">
              <label> Page
                <select id="page_index" onchange="location = this.value">
                  @for ($page = 1; $page <= $dishs->lastPage(); $page++)
                    <option value="@getLink(page,dishs,$page)" {{$dishs->currentPage() == $page ? 'selected' : ''}}>
                      {{$page}}</option>

         @endfor
                </select>
              </label> of <span>{{$dishs->lastPage()}}</span>
              <div class="btn-group">
                <a class="btn btn-success btn-sm{{$dishs->currentPage() <= 1 ? ' disabled' : ''}}"
                  href="@getLink(page,dishs,$dishs->currentPage()-1)"><i class="fa fa-chevron-left"></i></a>
                <a class="btn btn-success btn-sm{{$dishs->currentPage() >= $dishs->lastPage() ? ' disabled' : ''}}"
                  href="@getLink(page,dishs,$dishs->currentPage()+1)"><i class="fa fa-chevron-right"></i></a>
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
