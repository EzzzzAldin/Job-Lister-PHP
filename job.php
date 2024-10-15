<?php

// include Config File

include_once "./config/init.php";

// Connect DB

$job = new Job;

if(isset($_POST["del_id"])) {
    $del_id = $_POST["del_id"];
    if($job->delete($del_id)) {
        redirect("index.php", "Job Deleted", "success");
    } else {
        redirect("index.php", "Job Not Deleted", "field");
    }
}

// Create Front page
$template = new Template("templates/job-single.php");

// Check If Get category Is found Or Empty
$job_id = isset($_GET["id"]) ? $_GET["id"] : null;

$template->job = $job->getJob($job_id);

echo $template;
