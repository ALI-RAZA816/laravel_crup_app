@extends('layout.layout')
@section('table')
<div class="card-panel p-4">
    <div class="modal-dialog">
        <div class="modal-content">
        <form id="recordForm" action="{{route('addUser')}}" method="POST">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add Record</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="recordId">
                <div class="mb-3">
                    <label class="form-label">Full Name <span class="required-star">*</span></label>
                    <input type="text" class="form-control" name='name' id="fieldName" required>
                    <div class="invalid-feedback">Please enter a name.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email <span class="required-star">*</span></label>
                    <input type="email" class="form-control" name='email' id="fieldEmail" required>
                    <div class="invalid-feedback">Please enter a valid email.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="fieldPhone" placeholder="e.g. 0300-1234567">
                </div>
                <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-select" name='role' id="fieldRole">
                        <option value="Admin">Admin</option>
                        <option value="Editor">Editor</option>
                        <option value="Viewer" selected>Viewer</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-accent" id="saveBtn">Save Record</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('title')
    Add
@endsection

