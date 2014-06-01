<?php

class Includes {

    // //return search of a query in jobs
    // public static function search($query){
    //     $query = trim(trim($query, '$'));
    //     return DB::table('employers')
    //         ->join('jobs', 'jobs.employer_id', '=', 'employers.id')
    //         ->where('jobs.title', 'LIKE', "%$query%")
    //         ->orWhere('jobs.city', 'LIKE', "%$query%")
    //         ->orWhere('jobs.salary', '>', "$query")
    //         ->orWhere('employers.industry', 'LIKE', "%$query%");
    // }

    //return search of a query in jobs
    public static function search($query){
        $date = new DateTime;
        $query = trim(trim($query, '$'));
        return Job::with('employer')->whereNested(function($q) use($query)
            {
                $query = Input::get('query');
                $q->where('title', 'LIKE', "%$query%");
                $q->orWhere('city', 'LIKE', "%$query%");
                $q->orWhere('salary', '>', "$query");
                $q->orWhere('industry', 'LIKE', "%$query%");
            })
            ->where('end_date', '>=', $date);
        }
}
