<!-- sidenav start -->
<span class="open-slide">
    <a onclick="openSideMenu()">
        <svg width="30" height="30">
            <path d="M0,5 30,5" stroke="#000" stroke-width="5" />
            <path d="M0,14 30,14" stroke="#000" stroke-width="5" />
            <path d="M0,23 30,23" stroke="#000" stroke-width="5" />
        </svg>
    </a>
</span>

<div id="side-menu" class="side-nav">
    <a class="btn-close" onclick="closeSideMenu()">&times;</a>
    <a href="<?php echo BASE_URL; ?>organizer">Home</a>
    <a href="<?php echo BASE_URL; ?>organizer/create_project">Create New Projects</a>
    <a href="<?php echo BASE_URL; ?>organizer/upcoming_projects">Upcoming Projects</a>
    <a href="<?php echo BASE_URL; ?>organizer/completed_projects">Completed Projects</a>
    <a href="<?php echo BASE_URL; ?>organizer/requests">Requests from Volunteers</a>
    <a href="<?php echo BASE_URL; ?>organizer/payments">Payments</a>
    <a href="<?php echo BASE_URL; ?>organizer/calendar">Calendar</a>
    <a href="<?php echo BASE_URL; ?>organizer/blog">My Blog</a>
    <a href="<?php echo BASE_URL; ?>organizer/search_user">Search Users</a>
    <a href="<?php echo BASE_URL; ?>organizer/complain">Complain</a>
</div>
<!-- sidenav end -->