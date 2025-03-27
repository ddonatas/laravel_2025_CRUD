@extends('layouts.layout')

@section('title', 'Studentų sąrašas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Studentų sąrašas</h2>
        <a href="{{ route('students.create') }}" class="btn btn-success">Pridėti studentą</a>
        <a href="{{ route('students.trashed') }}" class="btn btn-warning">Rodyti pašalintus</a>
        
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
            <th>ID</th>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Adresas</th>
                <th>Miestas</th>
                <th>Veiksmai</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->surname }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->city->name }}</td>

                <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Redaguoti</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Ištrinti</button>
                        </form>
                    </td>
                
            </tr>
            @endforeach

        </tbody>
    </table>

    {{ $students->links() }} <!-- Pagination -->
    
@endsection
