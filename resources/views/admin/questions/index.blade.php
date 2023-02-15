@extends('layouts.admin')

@section('content')

    <div class="title d-flex justify-content-between">
        <h3 class="page-title">Pitanje</h3>
        @can('question_create')
        <p >
            <a href="{{ route('admin.questions.create') }}" class="btn btn-success">Dodaj novo</a>
            
        </p>
        @endcan
   </div>

    <p class="m-0">
        <ul class="d-flex list-unstyled" style="column-gap: 1rem">
            <li><a href="{{ route('admin.questions.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">Svi</a></li> |
            <li><a href="{{ route('admin.questions.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Korpa</a></li>
        </ul>
    </p>

<div class="card">
    <div class="card-header">
    Pitanje
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-Location">
                <thead>
                    <tr>
                        <th width="10">
                            #
                        </th>
                        <th>
                            Pitanje
                        </th>
                        <th>
                            Slika za pitanje
                        </th>
                        <th>
                            Rezultat
                        </th>
                        <th>
                            Akcija
                        </th>
                    </tr>
                </thead>
                <tbody>

                @forelse($questions as $question)
                    <tr data-entry-id="{{ $question->id }}">
                        <td>
                        </td>
                        <td>
                            {{ $question->question }}
                        </td>
                        <td>
                        @if($question->question_image)<a href="{{ Storage::url($question->question_image) }}" target="_blank"><img src="{{  Storage::url($question->question_image) }}"/></a>@endif
                        </td>
                        <td>
                            {{ $question->score }}
                        </td>
                        <td>
                        @if( request('show_deleted') == 1 )
                        <form action="{{ route('admin.questions.restore', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-xs btn-info" >Povrati</button>
                        </form>
                        <form action="{{ route('admin.questions.perma_del', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-xs btn-danger" >Izbriši</button>
                        </form>
                        @else
                            <a class="btn btn-xs btn-info" href="{{ route('admin.questions.edit', $question->id) }}">
                                Izmeni
                            </a>
                            <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-xs btn-danger" >Izbriši</button>
                            </form>
                        @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="12">Podaci nisu pronađeni!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


    </div>
</div>
@endsection