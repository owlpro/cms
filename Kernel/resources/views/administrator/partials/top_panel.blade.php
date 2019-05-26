<div class="top_panel">
    <div>
        @include('administrator.partials.languages')
    </div>
    <div></div>
    <div class="top_access">
        <ul>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fal fa-tachometer-slow"></i>
                    <span>@lang('panel.dashboard')</span>
                </a>
            </li>
            <li>
                <a href="{{ route('system') }}">
                    <i class="fal fa-desktop"></i>
                    <span>@lang('panel.system')</span>
                </a>
            </li>
            <li>
                <a href="{{ route('module') }}">
                    <i class="fal fa-th"></i>
                    <span>@lang('panel.modules')</span>
                </a>
            </li>
            <li>
                <a href="{{ route('setting') }}">
                    <i class="fal fa-cog"></i>
                    <span>@lang('panel.settings')</span>
                </a>
            </li>
        </ul>
    </div>
</div>
