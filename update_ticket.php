<?php
// Database connection
include 'db_connect.php';

// Check if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticket_id = $_POST['ticket_id'];
    $action = $_POST['action'];

    // Handle closing the ticket
    if ($action == 'close') {
        $sql = "UPDATE tickets SET status = 'Closed' WHERE id = $ticket_id";
        if ($conn->query($sql) === TRUE) {
            echo "Ticket status updated successfully.<br>";
        } else {
            echo "Error updating ticket: " . $conn->error;
        }
    }

    // Handle deleting the ticket
    if ($action == 'delete') {
        $sql = "DELETE FROM tickets WHERE id = $ticket_id";
        if ($conn->query($sql) === TRUE) {
            echo "Ticket deleted successfully.<br>";
        } else {
            echo "Error deleting ticket: " . $conn->error;
        }
    }
}

// Close connection
$conn->close();

// Redirect back to view tickets page after action
header("Location: view_tickets.php");
exit();
?>
