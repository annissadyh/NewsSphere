<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .nav-item.active {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar sidebar-style-2">			
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
            <div class="sidebar-content">
                <div class="user">
                    <div class="avatar-sm float-left mr-2">
                <img src="{{ asset('img/user-circle-blue.svg') }}" alt="..." class="avatar-img rounded-circle">
                    </div>
                    <div class="info">
                        <a style="text-decoration: none;" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                {{ Auth::user()->name }}
                                <span class="user-level">{{ Auth::user()->role }}</span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                        <div class="collapse in" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a style="text-decoration: none;" href="#profile">
                                        <span class="link-collapse">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a style="text-decoration: none;" href="{{ route('profile.edit') }}">
                                        <span class="link-collapse">Edit Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a style="text-decoration: none;" href="#settings">
                                        <span class="link-collapse">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-primary">
                    @if(Auth::user()->role == 'admin')
                        <li class="nav-item" id="dashboard">
                            <a style="text-decoration: none;" href="{{ route('dashboard') }}" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Content</h4>
                    </li>
                    <li class="nav-item" id="article">
                        <a style="text-decoration: none;" href="{{ route('article.index') }}">
                            <i class="fas fa-book"></i>
                            <p>Artikel</p>
                        </a>
                    </li>
                    @if(Auth::user()->role == 'admin')
                    <li class="nav-item" id="category">
                        <a style="text-decoration: none;" href="{{ route('category.index') }}">
                            <i class="fas fa-pen"></i>
                            <p>Category</p>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item" >
                            <a style="text-decoration: none;" href="{{ route('home') }}" >
                                <i class="fa-solid fa-house"></i>
                                {{ __('Home') }}
                            </a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button style="text-decoration: none;" type="submit" class="btn btn-link">
                                <i class="fas fa-undo"></i>
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </li>
                </ul>                
            </div>
        </div>
    </div>

    <script defer>
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');
            
            // Check localStorage for the active item
            const activeItem = localStorage.getItem('activeNavItem');
            
            if (activeItem) {
                document.getElementById(activeItem).classList.add('active');
            } else {
                // Set default active item if none is found in localStorage
                document.getElementById('dashboard').classList.add('active');
            }

            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove 'active' class from all items
                    navItems.forEach(nav => nav.classList.remove('active'));

                    // Add 'active' class to the clicked item
                    this.classList.add('active');

                    // Save the ID of the active item to localStorage
                    localStorage.setItem('activeNavItem', this.id);
                });
            });
        });
    </script>
</body>
</html>
