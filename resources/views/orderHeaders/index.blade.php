@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="col">
      <div class="col-12">
        <div id="searchbar" class="form-row mb-4">
            <input type="hidden" id="search_col" value="Orders.search">
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
            <a class="btn btn-sm btn-success" href="/orderHeaders/create">Create</a>
        </div>
        </div>
        <table class="table table-sm table-striped table-hover">
          <thead>
            <tr>
              <th class="@getSortClass(OrderHeader.id,asc)"><a
                  href="@getLink(sort,orderHeaders,OrderHeader.id,asc)">Id</a></th>
              <th class="@getSortClass(OrderHeader.order_date)"><a
                  href="@getLink(sort,orderHeaders,OrderHeader.order_date)">Order Date</a></th>
              <th class="@getSortClass(UserAccount.name)"><a
                  href="@getLink(sort,orderHeaders,UserAccount.name)">Name</a></th>
              <th class="@getSortClass(UserAccount.address)"><a
                  href="@getLink(sort,orderHeaders,UserAccount.address)">User Account Address</a></th>
              <th class="@getSortClass(Status.name)"><a href="@getLink(sort,orderHeaders,Status.name)">Status Name</a>
              </th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orderHeaders as $orderHeader)
            <tr>
              <td class="text-center">{{$orderHeader->id}}</td>
              <td class="text-center">{{$orderHeader->order_date}}</td>
              <td>{{$orderHeader->user_account_name}}</td>
              <td>{{$orderHeader->user_account_address}}</td>
              <td>{{$orderHeader->status_name}}</td>
              <td>
                <a class="btn btn-sm btn-secondary" href="/orderHeaders/{{$orderHeader->id}}" title="View"><i
                    class="fa fa-eye"></i></a>
                <a class="btn btn-sm btn-success" href="/orderHeaders/{{$orderHeader->id}}/edit" title="Edit"><i
                    class="fa fa-pencil"></i></a>
                @if ($orderHeader->status_name != 'Cancelled')
                <form action="{{ route('payment.refund') }}" method="POST">
                    @csrf
                    <input type="hidden" name="order_item" value="{{ json_encode($orderHeader) }}">
                    <button class="btn btn-sm btn-danger" onclick="cancelOrder(this)" type="submit" title="Cancel"><i
                        class="fa fa-times"></i></button>
                </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row mb-1">
          <div class="col-md-3 col-6">
            <label>Show
              <select id="page_size" onchange="location = this.value">
                <option value="@getLink(size,orderHeaders,10)" {{request()->input('size') == '10' ? 'selected' : ''}}>10
                </option>
                <option value="@getLink(size,orderHeaders,20)" {{request()->input('size') == '20' ? 'selected' : ''}}>20
                </option>
                <option value="@getLink(size,orderHeaders,30)" {{request()->input('size') == '30' ? 'selected' : ''}}>30
                </option>
              </select>
              entries
            </label>
          </div>
          <div class="col-md-9 col-6">
            <div class="float-right d-none d-md-block">
              <ul class="pagination flex-wrap">
                <li class="page-item{{$orderHeaders->currentPage() <= 1 ? ' disabled' : ''}}"><a class="page-link"
                    href="@getLink(page,orderHeaders,$orderHeaders->currentPage()-1)">Prev</a></li>
                @for ($page = 1; $page <= $orderHeaders->lastPage(); $page++)
                  <li class="page-item{{$orderHeaders->currentPage() == $page ? ' active' : ''}}"><a class="page-link"
                      href="@getLink(page,orderHeaders,$page)">{{$page}}</a></li>
                  @endfor
                  <li class="page-item{{$orderHeaders->currentPage() >= $orderHeaders->lastPage() ? ' disabled' : ''}}">
                    <a class="page-link" href="@getLink(page,orderHeaders,$orderHeaders->currentPage()+1)">Next</a></li>
              </ul>
            </div>
            <div class="float-right d-block d-md-none">
              <label> Page
                <select id="page_index" onchange="location = this.value">
                  @for ($page = 1; $page <= $orderHeaders->lastPage(); $page++)
                    <option value="@getLink(page,orderHeaders,$page)"

           {{$orderHeaders->currentPage() == $page ? 'selected' : ''}}>{{$page}}</option>
                    @endfor
                </select>
              </label> of <span>{{$orderHeaders->lastPage()}}</span>
              <div class="btn-group">
                <a class="btn btn-success btn-sm{{$orderHeaders->currentPage() <= 1 ? ' disabled' : ''}}"
                  href="@getLink(page,orderHeaders,$orderHeaders->currentPage()-1)"><i
                    class="fa fa-chevron-left"></i></a>
                <a class="btn btn-success btn-sm{{$orderHeaders->currentPage() >= $orderHeaders->lastPage() ? ' disabled' : ''}}"
                  href="@getLink(page,orderHeaders,$orderHeaders->currentPage()+1)"><i
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
