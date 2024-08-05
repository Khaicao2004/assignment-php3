   <!-- ========== App Menu ========== -->
   <div class="app-menu navbar-menu">
       <!-- LOGO -->
       <div class="navbar-brand-box">
           <!-- Dark Logo-->
           <a href="index.html" class="logo logo-dark">
               <span class="logo-sm">
                   <img src="{{ asset('theme/admin/assets/images/logo-sm.png') }}" alt="" height="22">
               </span>
               <span class="logo-lg">
                   <img src="{{ asset('theme/admin/assets/images/logo-dark.png') }}" alt="" height="17">
               </span>
           </a>
           <!-- Light Logo-->
           <a href="index.html" class="logo logo-light">
               <span class="logo-sm">
                   <img src="{{ asset('theme/admin/assets/images/logo-sm.png') }}" alt="" height="22">
               </span>
               <span class="logo-lg">
                   <img src="{{ asset('theme/admin/assets/images/logo-light.png') }}" alt="" height="17">
               </span>
           </a>
           <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
               id="vertical-hover">
               <i class="ri-record-circle-line"></i>
           </button>
       </div>

       <div id="scrollbar">
           <div class="container-fluid">

               <div id="two-column-menu">
               </div>
               <ul class="navbar-nav" id="navbar-nav">
                   <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                   <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUsers">
                        <i class=" bx bx-user-circle"></i>
                        <span data-key="t-layouts">Tài khoản</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUsers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">Danh sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('users.create') }}" class="nav-link">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAuthors" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAuthors">
                        <i class="bx bx-menu"></i>
                        <span data-key="t-layouts">Tác giả</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAuthors">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('authors.index') }}" class="nav-link">Danh sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('authors.create') }}" class="nav-link">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>
                   <li class="nav-item">
                       <a class="nav-link menu-link" href="#sidebarCatalogues" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarCatalogues">
                           <i class="bx bx-menu"></i>
                           <span data-key="t-layouts">Danh mục bài viết</span>
                       </a>
                       <div class="collapse menu-dropdown" id="sidebarCatalogues">
                           <ul class="nav nav-sm flex-column">
                               <li class="nav-item">
                                   <a href="{{ route('categories.index') }}" class="nav-link">Danh sách</a>
                               </li>
                               <li class="nav-item">
                                   <a href="{{ route('categories.create') }}" class="nav-link">Thêm mới</a>
                               </li>
                           </ul>
                       </div>
                   </li>
                   <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarTags" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarTags">
                        <i class="bx bx-menu"></i>
                        <span data-key="t-layouts">Tag</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarTags">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('tags.index') }}" class="nav-link">Danh sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('tags.create') }}" class="nav-link">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPhotos" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPhotos">
                        <i class="bx bx-menu"></i>
                        <span data-key="t-layouts">Photo</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPhotos">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('photos.index') }}" class="nav-link">Danh sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('photos.create') }}" class="nav-link">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>
                   <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPost" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarPost">
                        <i class="bx bx-menu"></i>
                        <span data-key="t-layouts">Bài viết</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPost">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('posts.index') }}" class="nav-link">Danh sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('posts.create') }}" class="nav-link">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>
               </ul>
           </div>
           <!-- Sidebar -->
       </div>

       <div class="sidebar-background"></div>
   </div>
   <!-- Left Sidebar End -->
