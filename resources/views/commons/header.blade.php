<header class="mb-5">
    <nav class="navbar navbar-expand-sm navbar-dark app-bg-color">
        <a class="navbar-brand" href="/">
            <i class="fas fa-envelope"></i> Ray mail system
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mx-auto">
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link text-light custom-link" href="{{ route('mail-list.index') }}">メールリスト管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light custom-link" href="{{ route('mail-template.index') }}">メールテンプレート一覧</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item"><a href="" class="nav-link text-light">{{ Auth::user()->name }}</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link text-light">ログアウト</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-light">ログイン</a></li>
                    <li class="nav-item"><a href="{{ route('signup') }}" class="nav-link text-light">新規ユーザ登録</a></li>
                @endif
            </ul>
        </div>
    </nav>
</header>