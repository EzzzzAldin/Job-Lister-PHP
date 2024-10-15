<?php

// include Config File

include_once "./config/init.php";

// Connect DB

$job = new Job;

$job_id = isset($_GET["id"]) ? $_GET["id"] : null;

if (isset($_POST['submit'])) {
    // create data
    $data = array();
    $data["job_title"] = $_POST["job_title"];
    $data["company"] = $_POST["company"];
    $data["category_id"] = $_POST["category"];
    $data["decription"] = $_POST["decription"];
    $data["location"] = $_POST["location"];
    $data["salary"] = $_POST["salary"];
    $data["contact_user"] = $_POST["contact_user"];
    $data["contact_email"] = $_POST["contact_email"];

    if($job->update($job_id, $data)) {
        redirect('index.php', "You are job has been Updated ", "success");
    } else {
        redirect('index.php', "Something went wrong", "field");
    }

}

// Create Front page
$template = new Template("templates/job-edit.php");

$template->categories = $job->getCategories();
$template->job = $job->getJob($job_id);

echo $template;
