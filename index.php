<?php

// include Config File

include_once "./config/init.php";

// Connect DB

$job = new Job;

// Create Front page
$template = new Template("templates/frontpage.php");

// Check If Get category Is found Or Empty
$category = isset($_GET["category"]) ? $_GET["category"] : null;

if ($category) {

    $template->jobs = $job->getByCategory($category);
    $template->title = "Job In " . $job->getCategory($category)->name;

} else {
    $template->title = "Latest Jobs";
    $template->jobs = $job->getAllJobs();
}

$template->categories = $job->getCategories();

echo $template;
