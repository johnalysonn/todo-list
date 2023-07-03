@extends('layout.layout')
@section('title', 'tasks-completed')
@section('content')

<div id="home-container">
    <!-- Title -->
    @if($search)
    <div class="w-100 px-5 py-4 pb-0">
        <h1 style="font-weight: 600;">Tasks completed</h1>
        
        <p style="color: #4a2b47" class="ms-1">Search for: {{$search}}</p>
       
    </div>
    @else
    <div class="w-100 px-5 py-4">
        <h1 style="font-weight: 600;">Tasks completed</h1>       
    </div>
    @endif
    <!-- EndTitle -->
    
    <div class="py-3 px-5 d-flex flex-column" style="gap: 50px;">
    <!-- Search -->
        <div class="form-floating">
            <form action="{{route('list_task_completed')}}" method="get" class="search rounded-pill p-2" name="search">
                @csrf
                <input type="text" class="w-100 rounded-pill p-2 ps-5" name="search" placeholder="Search">
                <label ><i class='bx bx-search fs-5'></i></label>
            </form>
        </div>
    <!-- EndSearch -->
    <!-- Content -->
        <div class="w-75 p-4 pt-1 rounded-4 table-style bold">
            <table class="w-100 fs-6">
            @if($tasks->count() > 0)
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($tasks as $task)
                        <tr>
                            <th scope="row">{{ $loop -> index +1 }}</th>
                            <td>{{$task->name}}</td>
                            <td class="d-flex align-items-center gap-2">
                                @if($task->status == 0)
                                <a href="{{Route('check', $task->id)}}"><i class='bx bx-checkbox checkbox'></i></a>
                                @else
                                <a href="{{Route('check', $task->id)}}"><i class='bx bx-checkbox-checked checkbox'></i></a>
                                @endif

                                <a href="{{Route('edit', $task->id)}}"><i class='bx bx-edit edit'></i></a>

                                <form action="{{Route('destroy', $task->id)}}" name="destroy">
                                    @csrf
                                    <button type="submit" class="bg-transparent d-flex pb-2 border-0 destroy"><i class='bx bx-trash'></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    
                </tbody>
                @else
                    <div class="w-100 text-center">
                        <p class="fs-4 bold">No tasks completed with the name</p>
                    </div>
                @endif
            </table>
        </div>
        <div class="w-75" id="container-paginate">
            {{$tasks->links()}}
        </div>
    </div>
</div>

@endsection