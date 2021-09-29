<?php
/**
 * excerpt lenth.
 */
function coming_soon_event_custom_excerpt_length($length)
{
    $length = get_theme_mod('coming_soon_event_excerpt_length', '');
    if (is_admin())
    {
        $length = get_theme_mod('coming_soon_event_excerpt_length', '');
    }
    return $length;
}
add_filter('excerpt_length', 'coming_soon_event_custom_excerpt_length');

function coming_soon_event_sanitize_select($input, $setting)
{

    // Ensure input is a slug.
    $input = sanitize_key($input);

    // Get list of choices from the control associated with the setting.
    $choices = $setting
        ->manager
        ->get_control($setting->id)->choices;

    // If the input is a valid key, return it; otherwise, return the default.
    return (array_key_exists($input, $choices) ? $input : $setting->default);
}

function coming_soon_event_sanitize_checkbox($checked)
{
    return ((isset($checked) && true === $checked) ? true : false);
}

function coming_soon_event_sanitize_phone_number($phone)
{
    return preg_replace('/[^\d+]/', '', $phone);
}

function coming_soon_event_sanitize_email($email, $setting)
{
    // Strips out all characters that are not allowable in an email address.
    $email = sanitize_email($email);

    // If $email is a valid email, return it; otherwise, return the default.
    return (!is_null($email) ? $email : $setting->default);
}

function coming_sooon_event_date_time_sanitization($input)
{
    return filter_var(preg_replace("([^0-9/] | [^0-9-])", "", htmlentities($input)));
}