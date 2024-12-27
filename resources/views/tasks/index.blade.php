@extends('layouts.app')

@section('content')
<div class="py-12">
    <h1 class="text-center text-5xl text-rose-800">Task List</h1>
    @if(session('success'))
    <div id="flash-message" class="alert alert-success col-md-8 mx-auto">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div id="flash-message" class="alert alert-danger col-md-8 mx-auto">
        {{ session('error') }}
    </div>
    @endif
    <div class="col-md-8 flex mx-auto justify-end mb-4">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded">Add Task</a>
    </div>
    <div class="col-md-8 mx-auto bg-white shadow-md rounded overflow-x-auto p-12">

<form method="GET" action="{{ route('dashboard') }}" id="filter-form">
    <div class="row align-items-center mb-3 flex justify-between">
       
        <div class="col-md-2">
            <select name="status" class="form-select" onchange="document.getElementById('filter-form').submit();">
                <option value="" selected disabled>All Statuses</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="col-md-2">
            <select name="sort_order" class="form-select" onchange="document.getElementById('filter-form').submit();">
                <option value="" selected disabled>Sort by</option>
                <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>Due Date (Ascending)</option>
                <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Due Date (Descending)</option>
            </select>
        </div>
    </div>
</form>



        <table class="table-auto w-full border-collapse border border-gray-300 table table-striped">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">#SN</th>
                    <th class="border border-gray-300 px-4 py-2">Title</th>
                    <th class="border border-gray-300 px-4 py-2">Description</th>
                    <th class="border border-gray-300 px-4 py-2">Due Date</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($tasks->isNotEmpty())
                @foreach ($tasks as $index => $task)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-4 font-bold">No tasks available.</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{ $tasks->links() }}
    </div>
</div>

<script>
    setTimeout(() => {
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.transition = 'opacity 0.5s ease';
            flashMessage.style.opacity = '0';
            setTimeout(() => flashMessage.remove(), 500);
        }
    }, 5000);
</script>
@endsection




