@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
       Kreiraj test
    </div>

    <div class="card-body">
        <form action="{{ route('admin.tests.store') }}" method="POST">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="course_id">Kurs*</label>
                <select name="course_id" class="form-control" id="teacher" >
                    @foreach($courses as $id => $course)
                        <option value="{{ $id }}">{{ $course }}</option>
                    @endforeach
                </select>
                @if($errors->has('course_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('course_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="lesson_id">Lekcija*</label>
                <select name="lesson_id" class="form-control" id="lesson_id" >
                    @foreach($lessons as $id => $lesson)
                        <option value="{{ $id }}">{{ $lesson }}</option>
                    @endforeach
                </select>
                @if($errors->has('lesson_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('lesson_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title">Naslov*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($test) ? $test->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">Opis*</label>
                <textarea id="description" name="description" rows="5" class="form-control" required>
                    {{ old('description', isset($test) ? $test->description : '') }}
                </textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('published') ? 'has-error' : '' }}">
                <label for="published">Postavljen*</label>
                <select name="published" class="form-control" id="published">
                    <option value="1">Aktivan</option>
                    <option value="0">Neaktivan</option>
                </select>
                @if($errors->has('published'))
                    <em class="invalid-feedback">
                        {{ $errors->first('published') }}
                    </em>
                @endif
            </div>
            <div>
                <button class="btn btn-danger" type="submit" >Sačuvaj</button>
            </div>
        </form>
    </div>
</div>
@endsection