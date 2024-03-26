@extends('layout.customer')
@section('content')
@php
    $found = false;
@endphp

<section id="orders" class="orders">
<div class="container">
  <div class="section-header d-flex justify-content-between align-items-center">
    <p>Your <span>Orders</span></p>
  </div>
  @foreach ($orderHeaders as $orderHeader)
  @if ($orderHeader->user_id === auth()->user()->id)
  <div class="row">
    <div class="col">
      <div class="col-12"><input id="searchbar_toggle" type="checkbox" />
        <table class="table table-sm table-striped table-hover">
          <thead>
            <tr>
              <th class="@getSortClass(OrderHeader.id,asc)"><a
                  href="@getLink(sort,orderHeaders,OrderHeader.id,asc)">Id</a></th>
              <th class="@getSortClass(OrderHeader.order_date)"><a
                  href="@getLink(sort,orderHeaders,OrderHeader.order_date)">Order Date</a></th>
              <th class="@getSortClass(UserAccount.address)"><a
                  href="@getLink(sort,orderHeaders,UserAccount.address)">Address</a></th>
              <th class="@getSortClass(Status.name)"><a href="@getLink(sort,orderHeaders,Status.name)">Status Name</a>
              </th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orderHeaders as $orderHeader)
            @if ($orderHeader->user_id === auth()->user()->id)
            <tr>
              <td class="text-center">{{$orderHeader->id}}</td>
              <td class="text-center">{{$orderHeader->order_date}}</td>
              <td>{{$orderHeader->user_account_address}}</td>
              <td>{{$orderHeader->status_name}}</td>
              <td class="text-center">
                <form action="/orders/{{$orderHeader->id}}" method="POST">
                  @method("DELETE")
                  @csrf
                  <a class="btn btn-sm btn-danger" href="#!" onclick="deleteItem(this)" title="Delete"><i
                      class="fa fa-times"></i></a>
                </form>
              </td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
        <div class="row mb-1">
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
                href="@getLink(page,orderHeaders,$orderHeaders->currentPage()-1)"><i class="fa fa-chevron-left"></i></a>
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
  @php
    $found = true;
  @endphp
  @break
  @endif
  @endforeach
  @if (!$found)

  <div>
    <p>Your don't have orders.</p>
  </div>
  @endif
</div>
</section>
<script>
initPage()
</script>
@endsection
