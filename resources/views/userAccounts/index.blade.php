@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="col-12">
                <input type="hidden" id="search_col" value="UserAccount.search">
                <input type="hidden" id="search_oper" value="c">
                <div id="searchbar" class="form-row mb-4">
                    <div class="form-group col">
                        <input id="search_word" autocomplete="off" onkeyup="search(event)" value="{{request()->input('sw')}}" class="form-control form-control-sm" />
                    </div>
                    <div class="col">
                        <button class="btn btn-success btn-sm" onclick="search()">Search</button>
                        <button class="btn btn-secondary btn-sm" onclick="clearSearch()">Clear</button>
                    </div>
                    <div class="col d-flex justify-content-end align-items-baseline">
                        <a class="btn btn-sm btn-success" href="/userAccounts/create">Create</a>
                    </div>
                </div>
                <table class="table table-sm table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="@getSortClass(UserAccount.id,asc)"><a href="@getLink(sort,userAccounts,UserAccount.id,asc)">Id</a></th>
                            <th class="@getSortClass(UserAccount.name)"><a href="@getLink(sort,userAccounts,UserAccount.name)">Name</a></th>
                            <th class="@getSortClass(UserAccount.email) d-none d-md-table-cell"><a href="@getLink(sort,userAccounts,UserAccount.email)">Email</a></th>
                            <th class="@getSortClass(UserAccount.active)"><a href="@getLink(sort,userAccounts,UserAccount.active)">Active</a></th>
                            <th class="@getSortClass(UserAccount.address)"><a href="@getLink(sort,userAccounts,UserAccount.address)">Address</a></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userAccounts as $userAccount)
                        <tr>
                            <td class="text-center">{{$userAccount->id}}</td>
                            <td>{{$userAccount->name}}</td>
                            <td class="d-none d-md-table-cell">{{$userAccount->email}}</td>
                            <td class="text-center">{{($userAccount->active ? '✓' : '✗')}}</td>
                            <td>{{$userAccount->address}}</td>
                            <td class="text-center">
                                <a class="btn btn-sm btn-secondary" href="/userAccounts/{{$userAccount->id}}" title="View"><i class="fa fa-eye"></i></a>
                                <a class="btn btn-sm btn-success" href="/userAccounts/{{$userAccount->id}}/edit" title="Edit"><i class="fa fa-pencil"></i></a>
                                <form action="/userAccounts/{{$userAccount->id}}" method="POST">
                                    @method("DELETE")
                                    @csrf
                                    <a class="btn btn-sm btn-danger" href="#!" onclick="deleteItem(this)" title="Delete"><i class="fa fa-times"></i></a>
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
                                <option value="@getLink(size,userAccounts,10)" {{request()->input('size') == '10' ? 'selected' : ''}}>10</option>
                                <option value="@getLink(size,userAccounts,20)" {{request()->input('size') == '20' ? 'selected' : ''}}>20</option>
                                <option value="@getLink(size,userAccounts,30)" {{request()->input('size') == '30' ? 'selected' : ''}}>30</option>
                            </select>
                            entries
                        </label>
                    </div>
                    <div class="col-md-9 col-6">
                        <div class="float-right d-none d-md-block">
                            <ul class="pagination flex-wrap">
                                <li class="page-item{{$userAccounts->currentPage() <= 1 ? ' disabled' : ''}}"><a class="page-link" href="@getLink(page,userAccounts,$userAccounts->currentPage()-1)">Prev</a></li>
                                @for ($page = 1; $page <= $userAccounts->lastPage(); $page++)
                                <li class="page-item{{$userAccounts->currentPage() == $page ? ' active' : ''}}"><a class="page-link" href="@getLink(page,userAccounts,$page)">{{$page}}</a></li>
                                @endfor
                                <li class="page-item{{$userAccounts->currentPage() >= $userAccounts->lastPage() ? ' disabled' : ''}}"><a class="page-link" href="@getLink(page,userAccounts,$userAccounts->currentPage()+1)">Next</a></li>
                            </ul>
                        </div>
                        <div class="float-right d-block d-md-none">
                            <label> Page
                                <select id="page_index" onchange="location = this.value">
                                    @for ($page = 1; $page <= $userAccounts->lastPage(); $page++)
                                    <option value="@getLink(page,userAccounts,$page)" {{$userAccounts->currentPage() == $page ? 'selected' : ''}}>{{$page}}</option>
                                    @endfor
                                </select>
                            </label> of <span>{{$userAccounts->lastPage()}}</span>
                            <div class="btn-group">
                                <a class="btn btn-success btn-sm{{$userAccounts->currentPage() <= 1 ? ' disabled' : ''}}" href="@getLink(page,userAccounts,$userAccounts->currentPage()-1)"><i class="fa fa-chevron-left"></i></a>
                                <a class="btn btn-success btn-sm{{$userAccounts->currentPage() >= $userAccounts->lastPage() ? ' disabled' : ''}}" href="@getLink(page,userAccounts,$userAccounts->currentPage()+1)"><i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                #searchbar_toggle_menu { display: inline-flex!important }
            </style>
        </div>
    </div>
</div>
<script>
    initPage()
</script>
@endsection
