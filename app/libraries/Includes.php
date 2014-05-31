<?php

class Includes {

    public static function helloWorld()
    {
        return 'Hello World';
    }

    //return search of a query in jobs
    public static function search($query){
        $query = trim(trim($query, '$'));
        return DB::table('jobs')
            ->join('employers', 'jobs.employer_id', '=', 'employers.id')
            ->where('jobs.title', 'LIKE', "%$query%")
            ->orWhere('jobs.city', 'LIKE', "%$query%")
            ->orWhere('jobs.description', 'LIKE', "%$query%")
            ->orWhere('salary', '>', "$query")
            ->orWhere('employers.industry', 'LIKE', "%$query%");
    }
}
