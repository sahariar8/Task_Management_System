
@extends('layouts.app')

@section('content')
<div class="container mt-8">
    <h1 class="text-center text-4xl font-bold text-emerald-700">Edit Task</h1>
    <div class="col-md-8 mx-auto">
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="border rounded-lg p-16 mt-8">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Home</a>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $task->title) }}" required>
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $task->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date"  id="due_date" class="form-control" value="{{ old('due_date', $task->due_date) }}" required>
            @error('due_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="Pending" {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ old('status', $task->status) === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-4 text-2xl">Update Task</button>
    </form>
    </div>
</div>
@endsection
