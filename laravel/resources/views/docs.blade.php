@extends('layout')

@section('title')Documentation @stop

@section('body')

<h2>Sebastian Schmidt, s2894777, Monday 2 June 2014</h2>

<h3>Credentials</h3>
<h4>Seekers</h4>
<div class="col-xs-6 col-sm-4">
    <p><i class="glyphicon glyphicon-user"></i> User name:<br />
    <i class="glyphicon glyphicon-lock"></i> Password:</p>
</div>
<div class="col-xs-6 col-sm-8">
    <p>seeker<br />
    123456</p>
</div>
<div class="col-xs-6 col-sm-4">
    <p><i class="glyphicon glyphicon-user"></i> User name:<br />
    <i class="glyphicon glyphicon-lock"></i> Password:</p>
</div>
<div class="col-xs-6 col-sm-8">
    <p>user<br />
    123456</p>
</div>
<h4>Employers</h4>
<div class="col-xs-6 col-sm-4">
    <p><i class="glyphicon glyphicon-user"></i> User name:<br />
    <i class="glyphicon glyphicon-lock"></i> Password:</p>
</div>
<div class="col-xs-6 col-sm-8">
    <p>apple<br />
    123456</p>
</div>
<div class="col-xs-6 col-sm-4">
    <p><i class="glyphicon glyphicon-user"></i> User name:<br />
    <i class="glyphicon glyphicon-lock"></i> Password:</p>
</div>
<div class="col-xs-6 col-sm-8">
    <p>coles<br />
    123456</p>
</div>
<h3>Description</h3>
<p>Any user can create an account after hitting the register button from the sidebar on any page. The <a href="../">Home page</a> allows the user to search for jobs in the database. Employers can create an account on the <a href="employer/create">Employers page</a>. One the account is created they can access all of the necessary options in the sidebar.
</p>
<h3>Limitations</h3>
<p>I have implemented the requirements and features to the best of my knowledge. To my understanding there are currently no limitations in using the website.</p>
<h3>Additions</h3>
<p>Any user or employer can cancel there account. If an employer chooses to delete their account, all of the linked jobs will also be deleted.
</p>
<h3>Database Design</h3>

<img src="../images/sql.png" class="img-responsive center-block" alt="Database schema">

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
<h3>Additional notes/Credits:</h3>
<h4>Resources used:</h4>

<p>Bootstrap. Retrieved from <a href="http://getbootstrap.com/">http://getbootstrap.com/</a></p>

<p>BootWatch. Retrieved from <a href="http://www.bootstrapcdn.com/#bootswatch">http://www.bootstrapcdn.com/#bootswatch</a></p>

<p>Datepicker for Bootstrap. Retrieved from <a href="http://www.eyecon.ro/bootstrap-datepicker/">http://www.eyecon.ro/bootstrap-datepicker/</a></p>

<p>jQuery. Retrieved from <a href="http://jquery.com/">http://jquery.com/</a></p>

<!-- syntax highlighting (Pretty Print from Google)-->
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?lang=sql&amp;skin=desert" defer></script>
@stop
