<?php
/**
 * iCal-rest-api - ICalController.php
 *
 * Initial version by: Jens
 * Initial created by on: 09-Jan-19
 * Time: 22:27
 */

namespace App\Http\Controllers;

use App\Event;


class ICalController extends Controller
{

    /**
     * Gets the events data from the database
     * and populates the iCal object.
     *
     * @return void
     */
    public function getEventsICalObject()
    {
        $events = Event::all();
        define('ICAL_FORMAT', 'Ymd\THis\Z');

        $icalObject = "BEGIN:VCALENDAR
       VERSION:2.0
       METHOD:PUBLISH
       PRODID:-//Charles Oduk//Tech Events//EN\n";

        // loop over events
        foreach ($events as $event) {
            $icalObject .=
                "BEGIN:VEVENT
           DTSTART:" . date(ICAL_FORMAT, strtotime($event->starts_at)) . "
           DTEND:" . date(ICAL_FORMAT, strtotime($event->ends_at)) . "
           DTSTAMP:" . date(ICAL_FORMAT, strtotime($event->created_at)) . "
           SUMMARY:$event->summary
           UID:$event->uid
           STATUS:" . strtoupper($event->status) . "
           LAST-MODIFIED:" . date(ICAL_FORMAT, strtotime($event->updated_at)) . "
           LOCATION:$event->location
           END:VEVENT\n";
        }

        // close calendar
        $icalObject .= "END:VCALENDAR";

        // Set the headers
        header('Content-type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename="cal.ics"');

        // spaces aren't allowed in the icalObject
        $icalObject = str_replace(' ', '', $icalObject);

        echo $icalObject;
    }
}