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
              class="form-control form-control-sm" />
          </div>
          <div class="col">
            <button class="btn btn-success btn-sm" onclick="search()">Search</button>
            <button class="btn btn-secondary btn-sm" onclick="clearSearch()">Clear</button>
          </div>
        </div>
        <table class="table table-sm table-striped table-hover">
          <thead>
            <tr>
              <th class="@getSortClass(LoginLog.id,asc)"><a
                  href="@getLink(sort,loginLogs,LoginLog.id,asc)">Id</a></th>
              <th class="@getSortClass(UserAccount.name)"><a
                  href="@getLink(sort,loginLogs,UserAccount.name)">Name</a></th>
              <th class="@getSortClass(LoginLog.login_time)"><a href="@getLink(sort,loginLogs,LoginLog.login_time)">Login Time</a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($loginLogs as $loginLog)
            <tr>
              <td class="text-center">{{$loginLog->id}}</td>
              <td>{{$loginLog->user_account_name}}</td>
              <td>{{$loginLog->user_login_time}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="row mb-1">
          <div class="col-md-3 col-6">
            <label>Show
              <select id="page_size" onchange="location = this.value">
                <option value="@getLink(size,loginLogs,10)" {{request()->input('size') == '10' ? 'selected' : ''}}>10
                </option>
                <option value="@getLink(size,loginLogs,20)" {{request()->input('size') == '20' ? 'selected' : ''}}>20
                </option>
                <option value="@getLink(size,loginLogs,30)" {{request()->input('size') == '30' ? 'selected' : ''}}>30
                </option>
              </select>
              entries
            </label>
          </div>
          <div class="col-md-9 col-6">
            <div class="float-right d-none d-md-block">
              <ul class="pagination flex-wrap">
                <li class="page-item{{$loginLogs->currentPage() <= 1 ? ' disabled' : ''}}"><a class="page-link"
                    href="@getLink(page,loginLogs,$loginLogs->currentPage()-1)">Prev</a></li>
                @for ($page = 1; $page <= $loginLogs->lastPage(); $page++)
                  <li class="page-item{{$loginLogs->currentPage() == $page ? ' active' : ''}}"><a class="page-link"
                      href="@getLink(page,loginLogs,$page)">{{$page}}</a></li>
                  @endfor
                  <li class="page-item{{$loginLogs->currentPage() >= $loginLogs->lastPage() ? ' disabled' : ''}}">
                    <a class="page-link" href="@getLink(page,loginLogs,$loginLogs->currentPage()+1)">Next</a></li>
              </ul>
            </div>
            <div class="float-right d-block d-md-none">
              <label> Page
                <select id="page_index" onchange="location = this.value">
                  @for ($page = 1; $page <= $loginLogs->lastPage(); $page++)
                    <option value="@getLink(page,loginLogs,$page)"

           {{$loginLogs->currentPage() == $page ? 'selected' : ''}}>{{$page}}</option>
                    @endfor
                </select>
              </label> of <span>{{$loginLogs->lastPage()}}</span>
              <div class="btn-group">
                <a class="btn btn-success btn-sm{{$loginLogs->currentPage() <= 1 ? ' disabled' : ''}}"
                  href="@getLink(page,loginLogs,$loginLogs->currentPage()-1)"><i
                    class="fa fa-chevron-left"></i></a>
                <a class="btn btn-success btn-sm{{$loginLogs->currentPage() >= $loginLogs->lastPage() ? ' disabled' : ''}}"
                  href="@getLink(page,loginLogs,$loginLogs->currentPage()+1)"><i
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
