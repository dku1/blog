<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="nav nav-treeview d-flex justify-content-center">
            <li class="nav-item p-3">
                <a href="{{ route('admin.index') }}" class="nav-link">
                    Главная
                </a>
            </li>
            <li class="nav-item p-3">
                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                    Категории
                </a>
            </li>
            <li class="nav-item p-3">
                <a href="{{ route('admin.tags.index') }}" class="nav-link">
                    Тэги
                </a>
            </li>
            <li class="nav-item p-3">
                <a href="{{ route('admin.posts.index') }}" class="nav-link">
                    Посты
                </a>
            </li>
            <li class="nav-item p-3">
                <a href="{{ route('admin.users.index') }}" class="nav-link">
                    Пользователи
                </a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
