<?php

class Time
{
    public function get_time($pasttime, $today = null)
    {
        // Use the current date and time if $today is not provided
        $today = $today ?: date("Y-m-d H:i:s");

        // Create DateTime objects
        $datetime1 = new DateTime($pasttime);
        $datetime2 = new DateTime($today);

        // Get the difference between the two dates
        $interval = date_diff($datetime1, $datetime2);

        // Extract the differences in various units
        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;
        $hours = $interval->h;
        $minutes = $interval->i;
        $seconds = $interval->s;

        // Check how much time has passed and return the appropriate string
        if ($years >= 1) {
            return date("F jS, Y", strtotime($pasttime));
        } elseif ($months >= 1) {
            return date("F jS, Y", strtotime($pasttime));
        } elseif ($days >= 1) {
            return date("F jS, Y", strtotime($pasttime));
        } elseif ($hours >= 1) {
            return $hours == 1 ? "an hour ago" : "$hours hr, $minutes min ago";
        } elseif ($minutes >= 1) {
            return $minutes == 1 ? "a minute ago" : "$minutes minutes ago";
        } else {
            if ($seconds < 10) {
                return "few seconds ago";
            } else {
                return "$seconds seconds ago";
            }
        }
    }
}

?>
