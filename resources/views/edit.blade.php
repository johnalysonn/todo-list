@extends('layout.layout')
@section('title', 'EDIT')
@section('content')

<div class="d-flex justify-content-center align-items-center flex-column gap-5">
    <h1 style="font-weight: 600;">Edit</h1>

    <form name="formEdit" action="{{Route('update', $task->id)}}" class="form-control w-25 text-center text-light d-flex flex-column gap-5 p-3 rounded-5" id="glass" >
        @csrf
        <div class="d-flex flex-column text-center gap-3">
            <label>Name:</label>
            <input type="text" name="name" placeholder="Task name" class="bg-transparent rounded-pill p-1 px-3 border border-light text-light" style="outline: none; font-size: .8rem;" value="{{$task->name}}">
        </div>
        <button type="submit" class="p-1 px-2 rounded-pill border-0 text-light w-25 m-auto" style="background-color: #bf1eaf;">Edit</button>
    </form>
</div>
@endsection