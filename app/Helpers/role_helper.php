<?php



if (! function_exists('role_name')) {
    
    function role_name(){
        switch(true){
            case(in_groups('admin')):
                return 'Admin';
            case(in_groups('superadmin')):
                return 'Super Admin';
            case(in_groups('user')):
                return 'User';
            default:
                return 'Guest';
        }
}
}