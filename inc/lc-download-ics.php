<?php

/* 
 *
 *  Creates the .ics file for Outlook and other Calendars to import
 * 
 */

include 'lc-ics.php';

$filename = 'LCCC-Event-' . str_replace(' ', '-', $_POST['summary']);
header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $filename . '.ics');

$ics = new ICS(array(
  'location' => $_POST['location'],
  'description' => $_POST['description'],
  'dtstart' => $_POST['date_start'],
  'dtend' => $_POST['date_end'],
  'summary' => $_POST['summary'],
  'url' => $_POST['url']
));

echo $ics->to_string();