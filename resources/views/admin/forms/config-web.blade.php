@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">@lang('admin.config.index')</h1>
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.config.web') }}">
            @include('partials.admin.errors')

            <div class="field">
                <div class="file is-large has-name">
                    <label class="file-label">
                        <input class="file-input" type="file" name="logo">
                        <div class="file-cta">
                            <div class="file-icon">{!! icon('upload-cloud') !!}</div>
                            <div class="file-label">@lang('admin.config.logo')</div>
                        </div>
                        @if($logo)
                            <div class="file-name">
                                <a target="_blank" rel="noopener" href="{{ asset('storage/uploads/logo/'.$logo) }}">{{ $logo }}</a>
                            </div>
                        @else
                            <div class="file-name is-hidden"></div>
                        @endif
                    </label>
                </div>
            </div>



            <div class="field">
                <label class="label">{{ __('admin.config.about') }}</label>
                <div class="control">
                    <div class="select is-medium is-fullwidth">
                        <select name="about">
                            <option value="0">{{ __('admin.none') }}</option>
                            @foreach ($pages as $page)
                                <option {{ $about==$page->id ? 'selected' : '' }} value="{{ $page->id }}">{{ $page->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            @foreach($footer_cols as $footer_col)
            <div class="field">
                <label class="label">@lang('admin.config.'.$footer_col)</label>
                <div class="control">
                    <input class="input is-large" value="{{ $footer->{$footer_col}? $footer->{$footer_col}:old($footer_col) }}" type="text" name="{{ $footer_col }}">
                </div>
            </div>
            @endforeach

            @foreach($social_cols as $social_col)
            <div class="field">
                <label class="label">@lang('admin.config.'.$social_col)</label>
                <div class="control">
                    <input class="input is-large" value="{{ $social->{$social_col}? $social->{$social_col}:old($social_col) }}" type="text" name="{{ $social_col }}">
                </div>
            </div>
            @endforeach
    
            <div class="control">
                @csrf
                <button type="submit" class="button is-info is-fullwidth is-large">{{ __('admin.save') }}</button>
            </div>
            </form>
        </div>
    </section>
@endsection
