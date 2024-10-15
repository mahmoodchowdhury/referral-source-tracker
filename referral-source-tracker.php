<?php
/*
 * Plugin Name: Referral Source Tracker
 * Description: Tracks the original referral source of a lead and adds it to form submissions.
 * Version: 1.1
 * Author: Mahmood Chowdhury
 */

// Hook to initialize tracking on page load
add_action('wp', 'referral_source_tracker_init');

function referral_source_tracker_init() {
    // Check if a referral source is already stored in the session
    if (!session_id()) {
        session_start();
    }

    // If the session doesn't have the source and the visitor is from an external site
    if (!isset($_SESSION['referral_source'])) {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $referer = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST);

            // Source determination based on known platforms
            if (strpos($referer, 'google.com') !== false && strpos($referer, 'googleadservices.com') === false) {
                $_SESSION['referral_source'] = 'Google Search';
            } elseif (strpos($referer, 'bing.com') !== false && strpos($referer, 'bingads.microsoft.com') === false) {
                $_SESSION['referral_source'] = 'Bing Search';
            } elseif (strpos($referer, 'googleadservices.com') !== false) {
                $_SESSION['referral_source'] = 'Google Ads';
            } elseif (strpos($referer, 'bingads.microsoft.com') !== false) {
                $_SESSION['referral_source'] = 'Bing Ads';
            } elseif (strpos($referer, 'facebook.com') !== false) {
                $_SESSION['referral_source'] = 'Facebook';
            } elseif (strpos($referer, 'linkedin.com') !== false) {
                $_SESSION['referral_source'] = 'LinkedIn';
            } elseif (strpos($referer, 'capterra.com') !== false) {
                $_SESSION['referral_source'] = 'Capterra';
            } elseif (strpos($referer, 'g2.com') !== false) {
                $_SESSION['referral_source'] = 'G2';
            } elseif (strpos($referer, 'sourceforge.net') !== false) {
                $_SESSION['referral_source'] = 'SourceForge';
            } else {
                $_SESSION['referral_source'] = 'Direct or Other';
            }
        } else {
            // If no referer, assume direct or unknown traffic
            $_SESSION['referral_source'] = 'Direct or Other';
        }
    }
}

// Function to get the referral source dynamically
function get_referral_source() {
    if (!session_id()) {
        session_start();
    }
    return isset($_SESSION['referral_source']) ? $_SESSION['referral_source'] : 'Direct or Other';
}

// Make the referral source available as a dynamic variable in Gravity Forms and WPForms
add_filter('gform_field_value_referral_source', 'populate_referral_source');
add_filter('wpforms_field_value_referral_source', 'populate_referral_source');

function populate_referral_source($value) {
    return get_referral_source();
}

// Enqueue script to auto-populate hidden field in form
add_action('wp_enqueue_scripts', 'referral_source_enqueue_scripts');

function referral_source_enqueue_scripts() {
    wp_enqueue_script('referral-source-script', plugin_dir_url(__FILE__) . 'referral-source.js', array('jquery'), null, true);

    // Pass the referral source to JavaScript
    wp_localize_script('referral-source-script', 'referralSourceData', array(
        'referralSource' => get_referral_source()
    ));
}
