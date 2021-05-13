<?php

// Using the following reportage structure:
$reportage = [
    [
        'user' => 'Melissa Jones',
        'reportsTo' => false
    ],
    [
        'user' => 'Sam Little',
        'reportsTo' => 'Jason Beake'
    ],
    [
        'user' => 'Colleen Adams',
        'reportsTo' => 'Amy Barnes'
    ],
    [
        'user' => 'Amy Barnes',
        'reportsTo' => 'Melissa Jones'
    ],
    [
        'user' => 'Allison Meyers',
        'reportsTo' => 'Colleen Adams'
    ],
    [
        'user' => 'Jason Beake',
        'reportsTo' => 'Amy Barnes'
    ],
];

// (A) Write a function that returns the name of the user with
// the highest number of reports, indicated by the reportsTo value.
a_task($reportage);

// (B) Bonus: Write a function that returns the whole tree in descending
// order as an array above the user Allison Meyers. Your output should
// look like this: ["Melissa Jones","Amy Barnes","Colleen Adams"]
b_task($reportage, 'Allison Meyers');

function a_task($reportage)
{
    $result = [];

    foreach ($reportage as $report) {
        if (isset($result[$report['reportsTo']])) {
            $result[$report['reportsTo']]++;
        } else {
            $result[$report['reportsTo']] = 1;
        }
    }

// $max_reports = array_search(max($result), $result);
// or
    $max_reports = 0;
    foreach ($result as $key => $value) {
        if ($value > $max_reports) {
            $res = $key;
            $max_reports = $value;
        }
    }

    return ($res);
}

function b_task($reportage, $user)
{
    $user_reportsTo_esc = [];

    foreach ($reportage as $report) {
        if ($report['user'] == $user) {
            $user_reportsTo_esc[] = $report['reportsTo'];
        }

        foreach ($reportage as $report_check) {
            if ($report_check['user'] == end($user_reportsTo_esc)) {
                $user_reportsTo_esc[] = $report_check['reportsTo'];
            } else {
                $user_reportsTo = array_reverse($user_reportsTo_esc);
            }
        }
    }

    array_shift($user_reportsTo);
    return $user_reportsTo;
}