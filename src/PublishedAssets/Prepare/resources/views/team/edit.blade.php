@extends('quarx::layouts.blank')

@section('content')

<div class="container raw-margin-bottom-24">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Team Editor</h1>
            <div class="col-md-12 text-center">
                @include('partials.navigation')
            </div>

            <div class="col-md-12">
                @include('partials.errors')
                @include('partials.message')
            </div>
            <div class="col-md-6 raw-margin-bottom-24">
                <div>
                    {!! Form::model($team, ['route' => ['teams.update', $team->id], 'method' => 'patch']) !!}

                    {!! FormMaker::fromObject($team, ['name' => 'string']) !!}

                    {!! Form::submit('Update', ['class' => 'btn btn-primary pull-right']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-6 raw-margin-bottom-24">
                @if (Auth::user()->isTeamAdmin($team->id))
                        {!! Form::model($team, ['url' => 'teams/'.$team->id.'/invite', 'method' => 'post']) !!}

                        <div class="form-group">
                            <label>Invite a new member</label>
                            <input class="form-control" type="email" name="email" placeholder="Email">
                        </div>

                        {!! Form::submit('Invite', ['class' => 'btn btn-info pull-right']) !!}

                        {!! Form::close() !!}
                @endif
            </div>
            @if (Auth::user()->isTeamAdmin($team->id))
                <h2 class="text-center">Members</h2>
                <div class="col-md-12">
                    @if ($team->members->isEmpty())
                        <div class="col-md-12 raw-margin-bottom-24">
                            <div class="well text-center">No members found.</div>
                        </div>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <th>Name</th>
                                <th class="text-right">Action</th>
                            </thead>
                            <tbody>
                                @foreach($team->members as $member)
                                    <tr>
                                        <td>{{ $member->name }}</td>
                                        <td>
                                            @if (! $member->isTeamAdmin($team->id))
                                                <a class="btn btn-danger pull-right btn-sm" href="{{ url('teams/'.$team->id.'/remove/'.$member->id) }}" onclick="return confirm('Are you sure you want to remove this member?')">Remove</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

@stop

