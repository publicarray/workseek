<?php

class Includes {

    // return search of a query in jobs
    public static function search($query){
        $date = new DateTime;
        $query = trim(trim($query, '$'));

        $jobs = DB::table('jobs')
                ->join('employers', 'jobs.employer_id', '=', 'employers.id')
                ->whereNested(function($q) use($query)
                {
                    $q->orwhere('jobs.title', 'LIKE', "%$query%");
                    $q->orWhere('jobs.description', 'LIKE', "%$query%");
                    $q->orWhere('jobs.city', 'LIKE', "%$query%");
                    $q->orWhere('jobs.salary', '>', "$query");
                    $q->orWhere('employers.industry', 'LIKE', "%$query%");
                })
                ->where('jobs.end_date', '>', $date)
                ->orderBy('jobs.created_at', 'desc')
                ->remember(10);
            return $jobs;

    }

}
