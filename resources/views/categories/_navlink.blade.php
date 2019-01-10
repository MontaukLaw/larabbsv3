<li class="nav-item {{ active_class(if_route('topics.index')) }}"><a class="nav-link" href="{{ route('topics.index') }}">话题</a></li>
<li class="nav-item {{ category_nav_active(1) }}"><a class="nav-link" href="{{ route('categories.show', 1) }}">分享</a></li>
<li class="nav-item {{ category_nav_active(2) }}"><a class="nav-link" href="{{ route('categories.show', 2) }}">教程</a></li>
<li class="nav-item {{ category_nav_active(3) }}"><a class="nav-link" href="{{ route('categories.show', 3) }}">问答</a></li>
<li class="nav-item {{ category_nav_active(4) }}"><a class="nav-link" href="{{ route('categories.show', 4) }}">公告</a></li>
