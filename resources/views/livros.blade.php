@extends('layouts.app')
@section('header')
    @component('components.header', ['data' => $data->header])
    @endcomponent
@endsection
@section('main')
    @parent
    @component('components.dailyverses', ['dailyverses' => $data->dailyverses])
    @endcomponent
    <div class="container">
        <h1 class="h1">@lang('messages.version_book', ['version' => $data->version_full_name])</h1>
    </div>
    @component('components.books', ['data' => $data])
    @endcomponent
    <div class="container">
        <h1 class="h1 space-h1">@lang('messages.bibles') <small class="text-muted">@lang('messages.descriptionhome', ['amount' => ($data->countallversions)])</small></h1>
        <div class="row">
            <div class="col">
                <ul class="list-group list-group-flush">
                    @for ($cv = 0; $cv < 5; $cv++)
                        <li class="list-group-item version-bible">
                            @php
                            $url = $data->lang_bibles[config('data.language_default')][$cv]['abb'];
                            $url .= '/';
                            $url .= __('messages.books_href');
                            $acontent = $data->lang_bibles[config('data.language_default')][$cv]['version'];
                            @endphp
                            <a class="nav-link version-bible-link" href="{{ url( $url ) }}">
                                {{ $acontent }}
                            </a>
                        </li>
                    @endfor
                </ul>
            </div>
            <div class="col">
                <ul class="list-group list-group-flush">
                    @for ($cv = 5; $cv < 9; $cv++)
                    <li class="list-group-item version-bible">
                        @php
                        $url = $data->lang_bibles[config('data.language_default')][$cv]['abb'];
                        $url .= '/';
                        $url .= __('messages.books_href');
                        $acontent = $data->lang_bibles[config('data.language_default')][$cv]['version'];
                        @endphp
                        <a class="nav-link version-bible-link" href="{{ url( $url ) }}">
                            {{ $acontent }}
                        </a>
                    </li>
                    @endfor
                    <li class="list-group-item version-bible">
                        <a class="nav-link cursor-pointer version-bible-link" data-bs-toggle="modal" data-bs-target="#modal_bibles">
                            @lang('messages.other_bibles')
                        </a>
                    </li>                  
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    @component('components.footer', ['data' => $data->footer])
    @endcomponent
@endsection