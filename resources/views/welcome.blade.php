@extends('layout.layout')
@section('table')
<div>
  <div class="card-panel p-4 mb-4">
    <div class="row text-center g-0">
      <div class="col-3 stat-box">
        <div class="stat-num" id="statTotal">{{$total}}</div>
        <div class="stat-label">Total Records</div>
      </div>
      <div class="col-3 stat-box">
        <div class="stat-num" id="statInactive">{{$admin}}</div>
        <div class="stat-label">Admin</div>
      </div>
      <div class="col-3 stat-box">
        <div class="stat-num" id="statInactive">{{$viewer}}</div>
        <div class="stat-label">Viewer</div>
      </div>
      <div class="col-3 stat-box">
        <div class="stat-num" id="statInactive">{{$editor}}</div>
        <div class="stat-label">Editor</div>
      </div>
    </div>
  </div>

  <div class="card-panel p-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
      <div class="search-wrap">
        <form action="">
          <div class="input-group" style="max-width:320px;">
            <input type="text" id="searchInput" class="form-control" placeholder="Search by name or email...">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
          </div>
        </form>
      </div>
      <a href="/add"><button class="btn btn-accent" data-bs-toggle="modal" data-bs-target="#recordModal" onclick="openAddModal()">
        <i class="bi bi-plus-lg me-1"></i>Add Record
      </button></a>
    </div>

    <div class="table-responsive">
      <table class="table" id="recordsTable">
        <thead>
          <tr>
            <th style="width:40px;">#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th class="text-end" style="width:120px;">Actions</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          @foreach ($data as $user ) 
            <tr>
              <td>{{$user->id}}</td>
              <td>
                  <div class="d-flex align-items-center gap-2">
                      <span>{{$user->name}}</span>
                  </div>
              </td>
              <td>{{$user->email}}</td>
              <td>{{$user->phone}}</td>
              <td><span class="badge bg-light text-dark border badge-role">{{$user->role}}</span></td>
              <td class="text-end d-flex">
                  <a href="{{route('view.user', $user->id)}}"><button class="btn btn-sm btn-outline-secondary me-1" title="View"><i class="bi bi-eye"></i></button></a>
                  <a href="{{route('view.update', $user->id)}}"><button class="btn btn-sm btn-outline-primary me-1" title="Edit"><i class="bi bi-pencil"></i></button></a>
                  <a href="{{route('user.delete', $user->id)}}"><button class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button></a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div>
      {{$data->links()}}
    </div>
  </div>
</div>
@endsection

@section('title')
 User
@endsection