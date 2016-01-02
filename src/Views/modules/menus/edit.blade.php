@extends('quarx::layouts.dashboard')

@section('content')

    <div class="row">
        <h1 class="page-header">Menus</h1>
    </div>

    @include('quarx::modules.menus.breadcrumbs', ['location' => ['edit']])

    {!! Form::model($menu, ['route' => ['quarx.menus.update', CryptoService::encrypt($menu->id)], 'method' => 'patch']) !!}

        {!! FormMaker::fromObject($menu, FormMaker::getTableColumns('menus')) !!}

        <div class="form-group text-right">
            <a href="{!! URL::previous() !!}" class="btn btn-default raw-left">Cancel</a>
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    <div class="row">
        <div class="col-12">
            <a class="btn btn-primary pull-right" href="{!! URL::to('quarx/links/create?m='.CryptoService::encrypt($menu->id)) !!}">Add Link</a>
            <h1>Links</h1>
            @include('quarx::modules.links.index')
        </div>

    </div>

@endsection

@section('javascript')

    @parent
    {!! Minify::javascript(Quarx::asset('js/menu.js', 'application/javascript')) !!}

@endsection
