<?php
/*
 *
 * Adds button to calendar post output
 * 
 * 
 * 
*/

    function lc_add_to_calendar_buttons($title="", $eventstart="", $eventend="", $location="", $description="", $url=""){

		if(function_exists('lc_addToGoogleCalendar')){
            $string_return ='<form method="post" action="'. get_stylesheet_directory_uri() .'/inc/lc-download-ics.php">';
            $string_return .= '<input type="hidden" name="date_start" value="' . $eventstart . '">';
			$string_return .= '<input type="hidden" name="date_end" value="' . $eventend .'">';
			$string_return .= '<input type="hidden" name="location" value="'. $location . '">';
			$string_return .= '<input type="hidden" name="description" value="'. $description . '">';
			$string_return .= '<input type="hidden" name="summary" value="'. $title . '">';
			$string_return .= '<input type="hidden" name="url" value="' . $url . '">';
			$string_return .= '<a href="'. lc_addToGoogleCalendar($title, $eventstart, $eventend, $location, $description) . '" target="_blank" class="button add-to-google">Add to my Google Calendar</a>&nbsp;';
            $string_return .= '<input type="submit" class="add-to-calendar" value="Add to my Calendar">';
            $string_return .= '</form>';
            
            return $string_return;
        }  

    }
?>