@extends('layout.layout')
@section('table')
    <!-- View Modal -->
<div class="card-panel p-4">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Record Details</h5>
        </div>
        <div class="modal-body" id="viewBody">
        <div class="d-flex align-items-center gap-3 mb-3">
            <div>
            <h5 class="mb-0">{{$data->name}}</h5>
            <span class="badge bg-light text-dark border">{{$data->role}}</span>
            </div>
        </div>
        <table class="table table-sm">
            <tbody><tr><th style="width:120px;">Email</th><td>{{$data->email}}</td></tr>
            <tr><th>Phone</th><td>{{$data->phone}}</td></tr>
        </tbody></table>
        </div>
        </div>
    </div>
</div>
@endsection
@section('title')
    View
@endsection