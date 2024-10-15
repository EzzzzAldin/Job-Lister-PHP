<?php

class Job
{

    private $db;

    public function __construct()
    {
        // To connected DB & Use Methods
        $this->db = new DataBase;
    }

    public function getAllJobs()
    {
        // Use This Query To Use DB
        $this->db->query("SELECT jobs.*, categories.name AS cname
                    FROM jobs
                    INNER JOIN categories
                    ON jobs.category_id = categories.id
                    ORDER BY post_date DESC
                    ");

        // Get Result After Set This query
        $result = $this->db->resultSet();

        // Return Results
        return $result;
    }

    // Get Categories
    public function getCategories()
    {

        // Use This Query To Use DB To Get Categories
        $this->db->query("SELECT * FROM categories ");

        // Get Result After Set This query
        $result = $this->db->resultSet();

        // Return Results
        return $result;

    }

    public function getByCategory($category)
    {
        // Use This Query To Use DB
        $this->db->query("SELECT jobs.*, categories.name AS cname
                    FROM jobs
                    INNER JOIN categories
                    ON jobs.category_id = categories.id
                    WHERE jobs.category_id = $category
                    ORDER BY post_date DESC
                    ");

        // Get Result After Set This query
        $result = $this->db->resultSet();

        // Return Results
        return $result;
    }

    public function getCategory($category_id)
    {
        // Use This Query To Use DB
        $this->db->query("SELECT * FROM categories WHERE id =
                          :category_id");
        $this->db->bind(":category_id", $category_id);

        $row = $this->db->single();

        return $row;
    }

    // Get Job
    public function getJob($id)
    {
        // Use This Query To Use DB
        $this->db->query("SELECT * FROM jobs WHERE id = :id");
        $this->db->bind(":id", $id);

        $row = $this->db->single();

        return $row;
    }

    // Create Job
    public function create($data)
    {

        //Insert Query
        $this->db->query("INSERT INTO jobs (category_id, job_title, company, decription, location, salary, contact_user, contact_email)
			VALUES (:category_id,:job_title, :company, :decription, :location, :salary, :contact_user, :contact_email)");

        // Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':decription', $data['decription']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {

        //Insert Query
        $this->db->query("DELETE FROM jobs WHERE id= $id");
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function update($id, $data)
    {

        //Insert Query
        $this->db->query("UPDATE jobs
				SET
				category_id = :category_id,
				job_title = :job_title,
				company = :company,
				decription = :decription,
				location = :location,
				salary = :salary,
				contact_user = :contact_user,
				contact_email = :contact_email
				WHERE id = $id");

        // Bind Data
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':job_title', $data['job_title']);
        $this->db->bind(':company', $data['company']);
        $this->db->bind(':decription', $data['decription']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':contact_user', $data['contact_user']);
        $this->db->bind(':contact_email', $data['contact_email']);
        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
