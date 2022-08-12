@extends('layouts.base')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h4>Список задач</h4>

                @yield('tasks.content')
            </div>
        </div>
    </div>
</section>
@endsection
