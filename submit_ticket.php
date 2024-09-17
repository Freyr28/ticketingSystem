<?php
// Database connection
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $issue_category = $_POST['issue_category'];
    $description = $_POST['description'];

    // Insert data into the tickets table
    $sql = "INSERT INTO tickets (user_name, email, issue_category, description, status, created_at)
            VALUES ('$user_name', '$email', '$issue_category', '$description', 'Open', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Ticket successfully submitted!";
        // Add your navigation links
        echo "<br><a href='view_tickets.html'>View Tickets</a>";
        echo "<br><a href='submit_ticket.php'>Submit Another Ticket</a>";
        echo "<br><a href='index.html'>Home</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
