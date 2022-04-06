<?php

namespace App\Helpers;


use App\User;
use DateTime;
use Hekmatinasser\Verta\Verta;

class DateShamsi
{

    public static function shamsi_to_miladi($date)
    {
        $s_year = Verta::parse($date)->year;
        $s_month = Verta::parse($date)->month;
        $s_day = Verta::parse($date)->day;
        $start_date = Verta::getGregorian($s_year, $s_month, $s_day);
        $date1 = strtotime($start_date[0] . '/' . $start_date[1] . '/' . $start_date[2]);
        return date('Y-m-d', $date1);
    }

    public static function miladi_to_shamsi($date)
    {
        $s_year = Verta::parse($date)->year;
        $s_month = Verta::parse($date)->month;
        $s_day = Verta::parse($date)->day;
        $start_date = Verta::getJalali($s_year, $s_month, $s_day);
        $date1 = strtotime($start_date[0] . '/' . $start_date[1] . '/' . $start_date[2]);
        $date2 = date('Y-m-d', $date1);
        return DateTime::createFromFormat("Y-m-d", $date2);
    }

}
