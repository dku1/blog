<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-treeview d-flex justify-content-center">
            <li class="nav-item p-3">
                <a href="{{ route('personal.main.index') }}" class="nav-link">
                    Главная
                </a>
            </li>
            <li class="nav-item p-3">
                <a href="{{ route('personal.liked.index') }}" class="nav-link">
                    Избранное
                </a>
            </li>
            <li class="nav-item p-3">
                <a href="{{ route('personal.comment.index') }}" class="nav-link">
                    Комментарии
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
