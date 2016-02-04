@extends('quarx::layouts.blank')

@section('content')

    <div class="container raw-margin-top-48">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Team Manager</h1>
                <div class="col-md-12 text-center">
                    @include('partials.navigation')
                </div>

                @include('partials.errors')
                @include('partials.message')

                    <div class="col-md-12 raw-margin-bottom-24">
                        <div class="pull-right">
                            {!! Form::open(['url' => 'teams/search']) !!}
                            <input class="form-control form-inline pull-right" name="search" placeholder="Search">
                            {!! Form::close() !!}
                        </div>
                        <a class="btn btn-primary pull-left" href="{!! route('teams.create') !!}">Create New</a>
                    </div>

                    <div class="col-md-12">
                        @if ($teams->isEmpty())
                            <div class="col-md-12 raw-margin-bottom-24">
                                <div class="well text-center">No teams found.</div>
                            </div>
                        @else
                            <table class="table table-striped">
                                <thead>
                                    <th>Name</th>
                                    <th width="100px" class="text-right">Action</th>
                                </thead>
                                <tbody>
                                @foreach($teams as $team)
                                    <tr>
                                        <td>{{ $team->name }}</td>
                                        <td>
                                            <a class="btn btn-danger pull-right btn-sm" href="{!! route('teams.delete', [$team->id]) !!}" onclick="return confirm('Are you sure you want to delete this team?')"><i class="fa fa-trash"></i> Delete</a>
                                            <a class="btn btn-warning pull-right btn-sm raw-margin-right-16" href="{!! route('teams.edit', [$team->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                {!! $teams; !!}
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop