@extends('cms::layouts.dashboard')

@section('pageTitle') FAQs @stop

@section('content')

    <div class="col-md-12 mt-2">
        @include('cms::modules.faqs.breadcrumbs', ['location' => ['create']])
    </div>

    <div class="col-md-12">
        {!! Form::open(['route' => config('cms.backend-route-prefix', 'cms').'.faqs.store', 'class' => 'add']) !!}

            {!! FormMaker::fromTable('faqs', Config::get('cms.forms.faqs')) !!}

            <div class="form-group text-right">
                <a href="{!! url(config('cms.backend-route-prefix', 'cms').'/faqs') !!}" class="btn btn-secondary float-left">Cancel</a>
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection
