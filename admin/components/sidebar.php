<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item" id="sidebar-item-0"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item" id="sidebar-item-1"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/users" aria-expanded="false">
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item " id="sidebar-item-2"> 
                    <a class="sidebar-link waves-effect waves-dark"
                        href="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/admins" aria-expanded="false">
                        <i class="mdi mdi-account-settings-variant"></i>
                        <span class="hide-menu">Admins</span>
                    </a>
                </li>
                <li class="sidebar-item" id="sidebar-item-3"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/music" aria-expanded="false">
                        <i class="mdi mdi-music-note"></i>
                        <span class="hide-menu">Music</span>
                    </a>
                </li>
                <li class="sidebar-item" id="sidebar-item-4"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/artists" aria-expanded="false">
                        <i class="mdi mdi-account-star-variant"></i>
                        <span class="hide-menu">Artists</span>
                    </a>
                </li>
                <li class="sidebar-item" id="sidebar-item-5"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/albums" aria-expanded="false">
                        <i class="mdi mdi-album"></i>
                        <span class="hide-menu">Albums</span>
                    </a>
                </li>
                <li class="sidebar-item" id="sidebar-item-6"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/reviews" aria-expanded="false">
                        <i class="mdi mdi-star"></i>
                        <span class="hide-menu">Reviews</span>
                    </a>
                </li>


                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="./html/pages-profile.html" aria-expanded="false"><i
                            class="mdi mdi-account-network"></i><span class="hide-menu">Profile</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="./html/table-basic.html" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                            class="hide-menu">Table</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="./html/icon-material.html" aria-expanded="false"><i class="mdi mdi-face"></i><span
                            class="hide-menu">Icon</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="./html/starter-kit.html" aria-expanded="false"><i class="mdi mdi-file"></i><span
                            class="hide-menu">Blank</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

<script>
  $(document).ready(function() {
    // Sidebar link 'selected' class add/remove and breadcrumb
    let id = localStorage.getItem('sidebar-item') === null ? 'sidebar-item-0' : localStorage.getItem('sidebar-item');
    let breadcrumb = localStorage.getItem('breadcrumb') === null ? 'Dashboard' : localStorage.getItem('breadcrumb');
    $('.bc').text(breadcrumb);
    $('#'+id).addClass('selected');
    $('.sidebar-item').click(function() {
      id = $(this).attr('id');
      breadcrumb = $(this).find('.hide-menu').text();
      localStorage.setItem('breadcrumb', breadcrumb);
      localStorage.setItem('sidebar-item', id);
      $('#sidebarnav li').removeClass('selected');
    })
    
    if (breadcrumb === 'Dashboard') {
        $('#add-new-btn').hide();
    }

  })
</script>