@extends('layouts.admin')

@section('content')

    <div class="title d-flex justify-content-between">
        <h3 class="page-title">Test</h3>
        @can('test_create')
        <p >
            <a href="{{ route('admin.tests.create') }}" class="btn btn-success">Dodaj novi</a>
            
        </p>
        @endcan
   </div>

    <p class="m-0">
        <ul class="d-flex list-unstyled" style="column-gap: 1rem">
            <li><a href="{{ route('admin.tests.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">Svi</a></li> |
            <li><a href="{{ route('admin.tests.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">Korpa</a></li>
        </ul>
    </p>

<div class="card">
    <div class="card-header">
    Test
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
                            Kurs
                        </th>
                        <th>
                            Lekcija
                        </th>
                        <th>
                            Naslov
                        </th>
                        <th>
                            Opis
                        </th>
                        <th>
                            Postavljen
                        </th>
                        <th>
                            Akcija
                        </th>
                    </tr>
                </thead>
                <tbody>

                @forelse($tests as $test)
                    <tr data-entry-id="{{ $test->id }}">
                        <td>
                        </td>
                        <td>{{ $test->course->title ?? '' }}</td>
                        <td>{{ $test->lesson->title ?? '' }}</td>
                        <td>{{ $test->title }}</td>
                        <td>{!! $test->description !!}</td>
                        <td>{{ $test->published ? 'Active' : 'InActive' }}</td>
                        <td>
                        @if( request('show_deleted') == 1 )
                        <form action="{{ route('admin.tests.restore', $test->id) }}" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-xs btn-info" >Povrati </button>
                        </form>
                        <form action="{{ route('admin.tests.perma_del', $test->id) }}" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-xs btn-danger" >Izbriši</button>
                        </form>
                        @else
                            <a class="btn btn-xs btn-info" href="{{ route('admin.tests.edit', $test->id) }}">
                                Izmeni
                            </a>
                            <form action="{{ route('admin.tests.destroy', $test->id) }}" method="POST" onsubmit="return confirm('Are you sure ?');" style="display: inline-block;">
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