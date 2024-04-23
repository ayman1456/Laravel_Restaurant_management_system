<?php



if (!function_exists('getProfileImg')) {
    function getProfileImg()
    {
        if (auth('customer')->check()) {
            if (auth('customer')->user()->profile_url) {
                return  asset('storage/' . auth('customer')->user()->profile_url);
            } else {
                return "https://api.dicebear.com/8.x/initials/svg?seed=" . auth('customer')->user()->name;
            }
        }
    }
}
