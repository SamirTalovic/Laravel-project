@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Izmeni kurs
    </div>

    <div class="card-body">
        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            @if(!auth()->user()->isAdmin())
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="teacher">Nastavnici*</label>
                    <select name="teachers[]" class="form-control" id="teacher" multiple>
                        @foreach($teachers as $id => $teacher)
                            <option {{ $course->teachers->pluck('id')[0] == $id ? 'selected' : null }} value="{{ $id }}">{{ $teacher }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                </div>
            @endif
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title">Naslov*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($course) ? $course->title : '') }}" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="slug">Putanja*</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', isset($course) ? $course->slug : '') }}" required>
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="description">Opis*</label>
                <textarea id="description" name="description" rows="5" class="form-control" required>
                    {{ old('description', isset($course) ? $course->description : '') }}
                </textarea>
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="price">Cena*</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($course) ? $course->price : '') }}" required />
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="course_image">Slika kursa*</label>
                <input type="file" id="course_image" name="course_image" class="form-control" value="{{ old('course_image', isset($course) ? $course->course_image : '') }}" />
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="start_date">Datum početka*</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', isset($course) ? $course->start_date : '') }}" required />
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="published">Postavljen*</label>
                <select name="published" class="form-control" id="published">
                    <option {{ $course->published == 'Active' ? 'selected' : null }} value="1">Aktivan</option>
                    <option {{ $course->published == 'Inactive' ? 'selected' : null }} value="0">Neaktivan</option>
                </select>
                @if($errors->has('slug'))
                    <em class="invalid-feedback">
                        {{ $errors->first('slug') }}
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