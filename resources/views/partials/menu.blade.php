@if(Admin::user()->visible($item['roles']))
    @if(!isset($item['children']))
        <li>
            @if(url()->isValidUrl($item['uri']))
                <a href="{{ $item['uri'] }}" target="_blank"  @if($item['blank']==1) no-pjax @endif  >
            @else
                 <a href="{{ admin_base_path($item['uri']) }}" @if($item['blank']==1) no-pjax @endif >
            @endif
                <i class="fa {{$item['icon']}}"></i>
                <span>{{$item['title']}}</span>
            </a>
        </li>
    @else
        <li class="treeview">
            <a href="#" @if($item['blank']==1) no-pjax @endif>
                <i class="fa {{$item['icon']}}"></i>
                <span>{{$item['title']}}</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="treeview-menu nav nav-second-level">
                @foreach($item['children'] as $item)
                    @include('admin::partials.menu', $item)
                @endforeach
            </ul>
        </li>
    @endif
@endif