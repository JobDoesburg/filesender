<?php

include_once "vidattr.php";

function pagelink($page) {
    if(!GUI::isUserAllowedToAccessPage($page)) return;
    $class = ($page == GUI::currentPage()) ? ' active ' : '';
    
//    echo '<div><a class="'.$class.'" href="?s='.$page.'">'.Lang::tr($page.'_page_link').'</a></div>';
}

function pagemenuitem($page) {
    global $vidattr;
    
    if(!GUI::isUserAllowedToAccessPage($page)) return;
    $class = ($page == GUI::currentPage()) ? ' active ' : '';

    $label = Lang::tr($page.'_page');
    if( $page == 'transfers' ) {
        if (Auth::isAuthenticated()) {
            if (Auth::isAdmin()) {
                $uid = Utilities::arrayKeyOrDefault( $_GET, 'uid', 0, FILTER_VALIDATE_INT  );
                if( $uid ) {
                    $label = $label = Lang::tr($page.'_uid_page');
                    $class .= ' red';
                }
            }
        }
    }
    $icon = '';
    $faicon = '';
    if($page == 'guests') {
        $faicon = 'fa-users';
    }
    if($page == 'upload') {
        $faicon = 'fa-send';
    }
    if($page == 'user') {
        $faicon = 'fa-user';
    }
    if($page == 'privacy') {
        $faicon = 'fa-lock';
    }
    if($page == 'about') {
        $faicon = 'fa-info-circle';
    }
    if($page == 'admin') {
        $faicon = 'fa-cogs';
    }
    if($page == 'transfers') {
        $faicon = 'fa-list';
    }
    if($page == 'help') {
        $faicon = 'fa-question-circle';
    }
    
    if($faicon) {
        $icon = '<i class="fa '.$faicon.'"></i> ';
    }
    echo '<div class="nav-item">';
    echo '<a class="p-2 nav-link  '.$class.'" id="topmenu_'.$page.'" href="?s='.$page.$vidattr.'">'.$icon.$label.'</a>';
    echo '</div>';
}

