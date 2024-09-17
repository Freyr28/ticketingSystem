<?php
// Database connection
include 'db_connect.php';
// Fetch all tickets
$sql = "SELECT id, user_name, email, issue_category, description, status, created_at FROM tickets";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h1>Submitted Tickets</h1>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Category</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>";

    // Output data for each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["user_name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["issue_category"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>" . $row["status"] . "</td>
                <td>" . $row["created_at"] . "</td>
                <td>
                    <form action='update_ticket.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='ticket_id' value='" . $row["id"] . "'>
                        <input type='hidden' name='action' value='close'>
                        <input type='submit' value='Close Ticket'>
                    </form>
                    <form action='update_ticket.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='ticket_id' value='" . $row["id"] . "'>
                        <input type='hidden' name='action' value='delete'>
                        <input type='submit' value='Delete Ticket'>
                    </form>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No tickets found.";
}

// Close connection
$conn->close();
?>
