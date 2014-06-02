<?php

class Includes {

    // return search of a query in jobs
    public static function search($query){
        $date = new DateTime;
        $query = trim(trim($query, '$'));
        return Job::with('employer')->whereNested(function($q) use($query)
            {
                $q->orwhere('title', 'LIKE', "%$query%");
                $q->orWhere('city', 'LIKE', "%$query%");
                $q->orWhere('industry', 'LIKE', "%$query%");
                $q->orWhere('salary', '>', "$query");
            })
            ->where('end_date', '>=', $date);
        }
    // public static function search($query){
    //     $date = new DateTime;
    //     $query = trim(trim($query, '$'));
    //     $jobs = DB::table('jobs')
    //         ->join('employers', 'jobs.employer_id', '=', 'employers.id')
    //         ->where('jobs.title', 'LIKE', "%$query%")
    //         ->orWhere('jobs.city', 'LIKE', "%$query%")
    //         ->orWhere('jobs.description', 'LIKE', "%$query%")
    //         ->orWhere('salary', '>', "$query")
    //         ->orWhere('employers.industry', 'LIKE', "%$query%");
    //     return $jobs = $jobs->where('end_date', '>=', $date);
    // }
}
