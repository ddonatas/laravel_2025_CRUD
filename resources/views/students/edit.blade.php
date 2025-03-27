@extends('layouts.layout')

@section('title', 'Redaguoti studentą')

@section('content')
    <div class="container">
        <h2>Redaguoti studentą</h2>

        <form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="mb-3">
        <label for="name" class="form-label">Vardas</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="surname" class="form-label">Pavardė</label>
        <input type="text" name="surname" class="form-control" value="{{ old('surname', $student->surname) }}" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Adresas</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $student->address) }}" required>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Telefonas</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}" required>
    </div>

    <div class="mb-3">
        <label for="city_id" class="form-label">Miestas</label>
        <select name="city_id" class="form-control">
            @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ old('city_id', $student->city_id) == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Išsaugoti</button>
</form>

    </div>
@endsection
