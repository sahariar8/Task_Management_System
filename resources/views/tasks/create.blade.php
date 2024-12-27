@extends('layouts.app')

@section('content')
<div class="container mt-8">
    <h1 class="text-center text-4xl font-bold text-emerald-700">Add New Task</h1>
    <div class="col-md-8 mx-auto">
    <form action="{{ route('tasks.store') }}" method="POST" class="border rounded-lg p-16 mt-8">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date"  id="due_date" class="form-control" required>
            @error('due_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-4">Add Task</button>
    </form>
    </div>
</div>
@endsection
