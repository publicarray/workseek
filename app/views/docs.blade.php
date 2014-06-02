@extends('layout')

@section('title')Documentation @stop

@section('body')

<h2>Sebastian Schmidt, s2894777, Monday 2 June 2014</h2>

<h2>Limitations</h2>
<p>I have implemented the requirements and features to the best of my knowledge. To my understanding there is currently one limitation. When searching the site the industry column cannot be searched no other limitations in using the Application have been found.<p>

<h2>Database</h2>

{{ HTML::image("images/sql.png", "Database schema", array('class' => 'img-responsive center-block')) }}

<pre class="prettyprint lang-sql">

CREATE TABLE "migrations" (
                           "migration" varchar not null,
                           "batch" integer not null
                           );

CREATE TABLE "users" (
                      "id" integer not null primary key autoincrement,
                      "name" varchar not null,
                      "email" varchar not null,
                      "phone" integer null,
                      "username" varchar not null,
                      "password" varchar not null,
                      "role" varchar not null,
                      "remember_token" varchar null,
                      "created_at" datetime not null,
                      "updated_at" datetime not null,
                      "image_file_name" varchar null,
                      "image_file_size" integer null,
                      "image_content_type" varchar null,
                      "image_updated_at" datetime null
                      );

CREATE TABLE "employers" (
                          "id" integer not null primary key autoincrement,
                          "industry" varchar not null,
                          "description" text null,
                          "user_id" integer not null,
                          "created_at" datetime not null,
                          "updated_at" datetime not null
                          );

CREATE TABLE "jobs" (
                     "id" integer not null primary key autoincrement,
                     "title" varchar not null,
                     "salary" float not null,
                     "city" varchar not null,
                     "description" text not null,
                     "start_date" date not null,
                     "end_date" date not null,
                     "employer_id" integer not null,
                     "created_at" datetime not null,
                     "updated_at" datetime not null
                     );

CREATE TABLE "applications" (
                             "id" integer not null primary key autoincrement,
                             "letter" text not null,
                             "seeker_id" integer not null,
                             "job_id" integer not null,
                             "created_at" datetime not null,
                             "updated_at" datetime not null
                             );

CREATE TABLE "seekers" (
                        "id" integer not null primary key autoincrement,
                        "application_id" integer null,
                        "user_id" integer not null,
                        "created_at" datetime not null,
                        "updated_at" datetime not null
                        );

CREATE INDEX users_name_index on "users" ("name");
CREATE UNIQUE INDEX users_email_unique on "users" ("email");
CREATE UNIQUE INDEX users_username_unique on "users" ("username");
CREATE INDEX users_password_index on "users" ("password");
CREATE INDEX users_role_index on "users" ("role");
CREATE INDEX employers_industry_index on "employers" ("industry");
CREATE INDEX employers_user_id_index on "employers" ("user_id");
CREATE INDEX jobs_title_index on "jobs" ("title");
CREATE INDEX jobs_salary_index on "jobs" ("salary");
CREATE INDEX jobs_city_index on "jobs" ("city");
CREATE INDEX jobs_start_date_index on "jobs" ("start_date");
CREATE INDEX jobs_end_date_index on "jobs" ("end_date");
CREATE INDEX jobs_employer_id_index on "jobs" ("employer_id");
CREATE INDEX applications_seeker_id_index on "applications" ("seeker_id");
CREATE INDEX applications_job_id_index on "applications" ("job_id");
CREATE INDEX seekers_user_id_index on "seekers" ("user_id");

</pre>
<h2>Additional notes/Credits:</h2>
<h3>Resources used:</h3>

<p>Bootstrap. Retrieved from <a href="http://getbootstrap.com/">http://getbootstrap.com/</a></p>

<p>BootWatch. Retrieved from <a href="http://www.bootstrapcdn.com/#bootswatch">http://www.bootstrapcdn.com/#bootswatch</a></p>

<p>Datepicker for Bootstrap. Retrieved from <a href="http://www.eyecon.ro/bootstrap-datepicker/">http://www.eyecon.ro/bootstrap-datepicker/</a></p>

<p>jQuery. Retrieved from<a href="http://jquery.com/">http://jquery.com/</a></p>

<!-- syntax highlighting (Pretty Print from Google)-->
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=sql&amp;skin=desert" defer></script>
@stop
