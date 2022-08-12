@extends('layouts.tasks')

{{-- Указываем значение секции title, которая задана в шаблоне base  --}}
@section('title', 'Создание задачи')

@section('tasks.content')
{{-- Пример компонента (components.card) --}}
<x-card>
    <div class="card-body">
        <h5 class="card-title">Новая задача</h5>
        <p class="card-text">
          <form method="POST" action="{{ route('tasks.store') }}">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Название задачи</label>
                <input name="name" type="text" class="form-control" id="name">
                  @error('name')
                      @include('errors.form')
                  @enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Описание задачи</label>
                <textarea name="description" class="form-control" id="description"></textarea>
                @error('description')
                  @include('errors.form')
                @enderror
              </div>
              <div class="mb-3 form-check">
                <input value="1" name="important" type="checkbox" class="form-check-input" id="important">
                <label class="form-check-label" for="important">Важная задача</label>
                @error('important')
                  @include('errors.form')
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </p>
      </div>
</x-card>
@endsection
