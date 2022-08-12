@extends('layouts.base')

{{-- Здесть явно title не задан, значит будет браться title дефолтный из шаблона base  --}}

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h4>Список задач</h4>
                <div class="card">
                    <div class="card-body">
                        @if ($tasks->isEmpty())
                            Нет ни одной задачи
                        @else
                        @if (session('completed'))
                            <div class="alert alert-success">Задача выполнена, вы молодец!</div>
                        @endif
                        <x-tasklist>
                            @foreach ($tasks as $task)
                                @include('tasks.list-item', ['name' => $task->name, 'description' => $task->description, 'completed' => $task->completed, 'important' => $task->important])
                            @endforeach
                            <div class="mt-3">
                                {{$tasks->links('tasks.pagination')}}
                            </div>
                        </x-tasklist>
                        @endif
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection
