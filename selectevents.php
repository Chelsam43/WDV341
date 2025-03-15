<?php
require 'dbConnect.php';

try {
    $stmt = $pdo->prepare("SELECT event_id, event_name, event_date, event_description FROM events");
    $stmt->execute();
    $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Listings</title>

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 18px;
            padding: 18px;
            background-color: rgb(200, 208, 208);
        }
        h1 {
            text-align: center;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: ivory;
        }
        th, td {
            border: 1.5px solid #d0c9c9;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #282727;
            color: aliceblue;
        }
        tr:nth-child(odd) {
            background-color: #d6cfc2;
        }
        .no-events {
            text-align: center;
            font-size: 1.5em;
            color: pink;
        }
    </style>
</head>
<body>

    <h1>Upcoming Events</h1>

    <?php if (empty($events)) : ?>
        <p class="no-events">No Events Found</p>
    <?php else : ?>
        <table>
            <tr>
                <th>Event ID</th>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Description</th>
            </tr>
            <?php foreach ($events as $event) : ?>
            <tr>
                <td><?= htmlspecialchars($event['event_id']); ?></td>
                <td><?= htmlspecialchars($event['event_name']); ?></td>
                <td><?= htmlspecialchars($event['event_date']); ?></td>
                <td><?= htmlspecialchars($event['event_description']); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</body>
</html>