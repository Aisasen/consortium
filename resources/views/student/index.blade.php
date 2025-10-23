@extends('layouts.main')



@section('head')

    <title>Best Center - Студенты</title>

@endsection



@section('content')

    <main class="container">

        <section>

            <h1 class="text-center">Студенты</h1>

            <div class="mt-3 mb-3 d-flex flex-wrap justify-content-center justify-content-md-between gap-3">

                @foreach ($students as $student)

                <a href="{{ route('students.show', $student->id) }}" 
                   class="card text-decoration-none" style="width: 18rem;">

                    <div style="width: 100%; height: 200px; display: flex; align-items: center; justify-content: center; background: #f8f9fa;">
                        <img src="{{ $student->image ? $student->imageSrc : asset('imgs/profile.jpg')  }}" 
                             alt="{{ $student->name }}" 
                             style="max-height: 100%; max-width: 100%; object-fit: contain;">
                    </div>

                    <div class="card-body">
                        <p class="card-text text-center fw-bold text-decoration-none">
                            {{ $student->name }}
                        </p>
                    </div>
                </a>


                @endforeach



            </div>



            {{ $students->links() }}

        </section>

    </main>

@endsection