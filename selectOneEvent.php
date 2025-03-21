<?php
require_once 'dbConnect.php';

$eventID =isset($_GET['event_id']) ? (int)$_GET['event_id']:1; //sets default to first entry

try{
    $sql = "SELECT event_id, event_name, event_date, event_time FROM events WHERE event_id = :eventID";

    $stmt = $pdo->prepare($sql);
    $stmt -> bindParam(':eventID', $eventID, PDO::PARAM_INT);

    //execution
    $stmt->execute();

    //get
    $event = $stmt->fetch(PDO::FETCH_ASSOC);

    if($event){
        echo "<h2>Event Details</h2>";
        echo "<table border='2' cellpadding='12' cellspacing='0'>";
        echo "<tr><th>Event ID</th><th>Event Name</th><th>Event Date</th><th>Event Time</></tr>";
        echo "<tr>";
        echo "<td>".htmlspecialchars($event['event_id'])."</td>";
        echo "<td>".htmlspecialchars($event['event_name'])."</td>";
        echo "<td>".htmlspecialchars($event['event_date'])."</td>";
        echo "<td>".htmlspecialchars($event['event_time'])."</td>";
        echo "</tr>";
        echo "</table>";
    }else {
        echo "<p>Event Not found with that ID.</p>";
    }

    } catch (PDOException $e){
        echo "<p>Fetching Error:".htmlspecialchars($e->getMessage())."</p>";
    }
