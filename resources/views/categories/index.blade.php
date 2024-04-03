@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="col-12">
        <div id="searchbar" class="form-row mb-4">
          <input type="hidden" id="search_col" value="Category.search">
          <input type="hidden" id="search_oper" value="c">
          <div class="form-group col">
            <input id="search_word" autocomplete="off" onkeyup="search(event)" value="{{request()->input('sw')}}"
              class="form-control form-control-sm" />
          </div>
          <div class="col">
            <button class="btn btn-success btn-sm" onclick="search()">Search</button>
            <button class="btn btn-secondary btn-sm" onclick="clearSearch()">Clear</button>
          </div>
          <div class="col d-flex justify-content-end align-items-baseline">
            <a class="btn btn-sm btn-success" href="/categories/create">Create</a>
          </div>
        </div>
        <table class="table table-sm table-striped table-hover">
          <thead>
            <tr>
              <th class="@getSortClass(Category.id,asc)"><a href="@getLink(sort,categories,Category.id,asc)">Id</a></th>
              <th class="@getSortClass(Category.name)"><a href="@getLink(sort,categories,Category.name)">Name</a></th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              <td class="text-center">{{$category->id}}</td>
              <td>{{$category->name}}</td>
              <td class="text-center">
                <a class="btn btn-sm btn-secondary" href="/categories/{{$category->id}}" title="View"><i
                    class="fa fa-eye"></i></a>
                <a class="btn btn-sm btn-success" href="/categories/{{$category->id}}/edit" title="Edit"><i
                    class="fa fa-pencil"></i></a>
                <form action="/categories/{{$category->id}}" method="POST">
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
                <option value="@getLink(size,categories,10)" {{request()->input('size') == '10' ? 'selected' : ''}}>10
                </option>
                <option value="@getLink(size,categories,20)" {{request()->input('size') == '20' ? 'selected' : ''}}>20
                </option>
                <option value="@getLink(size,categories,30)" {{request()->input('size') == '30' ? 'selected' : ''}}>30
                </option>
              </select>
              entries
            </label>
          </div>
          <div class="col-md-9 col-6">
            <div class="float-right d-none d-md-block">
              <ul class="pagination flex-wrap">
                <li class="page-item{{$categories->currentPage() <= 1 ? ' disabled' : ''}}"><a class="page-link"
                    href="@getLink(page,categories,$categories->currentPage()-1)">Prev</a></li>
                @for ($page = 1; $page <= $categories->lastPage(); $page++)
                  <li class="page-item{{$categories->currentPage() == $page ? ' active' : ''}}"><a class="page-link"
                      href="@getLink(page,categories,$page)">{{$page}}</a></li>
                  @endfor
                  <li class="page-item{{$categories->currentPage() >= $categories->lastPage() ? ' disabled' : ''}}"><a
                      class="page-link" href="@getLink(page,categories,$categories->currentPage()+1)">Next</a></li>
              </ul>
            </div>
            <div class="float-right d-block d-md-none">
              <label> Page
                <select id="page_index" onchange="location = this.value">
                  @for ($page = 1; $page <= $categories->lastPage(); $page++)
                    <option value="@getLink(page,categories,$page)"
                      {{$categories->currentPage() == $page ? 'selected' : ''}}>{{$page}}</option>
                    @endfor
                </select>
              </label> of <span>{{$categories->lastPage()}}</span>
              <div class="btn-group">
                <a class="btn btn-success btn-sm{{$categories->currentPage() <= 1 ? ' disabled' : ''}}"
                  href="@getLink(page,categories,$categories->currentPage()-1)"><i class="fa fa-chevron-left"></i></a>
                <a class="btn btn-success btn-sm{{$categories->currentPage() >= $categories->lastPage() ? ' disabled' : ''}}"
                  href="@getLink(page,categories,$categories->currentPage()+1)"><i class="fa fa-chevron-right"></i></a>

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
