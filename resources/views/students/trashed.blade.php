@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h1 class="mb-0">Ištrinti studentai</h1>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Adresas</th>
                        <th>Miestas</th>
                        <th>Telefonas</th>
                        <th>Veiksmai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->surname }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->city ? $student->city->name : 'Nenurodyta' }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>
                                <form action="{{ route('students.restore', $student->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Atkurti</button>
                                </form>

                                <form action="{{ route('students.forceDelete', $student->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ar tikrai norite visiškai ištrinti?')">Ištrinti visam laikui</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $students->links() }}

            <a href="{{ route('students.index') }}" class="btn btn-primary mt-3">Grįžti į studentų sąrašą</a>
        </div>
    </div>
</div>
@endsection
