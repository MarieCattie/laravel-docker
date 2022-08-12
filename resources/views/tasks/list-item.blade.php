<li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">{{$name}}</div>
      <div>{{$description}}</div>
      @if (!$completed)
        <form action="{{route('tasks.complete', $task)}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary mt-4">Готово</button>
        </form>
      @endif

    </div>
    <p class="text-secondary mx-3">{{$task->created_at->format("d.m.Y")}}</p>
    @if ($important && !$completed)
        <span class="badge bg-danger rounded-pill mx-2">Важная</span>
    @endif
    @if ($completed)
        <span class="badge bg-secondary rounded-pill">Завершена</span>
    @else
        <span class="badge bg-primary rounded-pill">Активная</span>
    @endif
  </li>

