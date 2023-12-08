<?php
session_start();  
require_once '../database/config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt = $link->prepare("SELECT c.*, u.firstname as assignNameR, u.lastname as assignNameL, us.firstname as creatorF, us.lastname as creatorL
        FROM contacts c
        JOIN users u ON u.id = c.created_by 
        JOIN users us ON us.id = c.assigned_to
        WHERE c.email =?");
        // $stmt = $link->prepare("SELECT c.*,  us.firstname as creatorF, us.lastname as creatorL FROM contacts c JOIN users us ON us.id = c.assigned_to WHERE c.email =?");
        $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
        $stmt->bind_param("s", $email);
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $result = $result->fetch_assoc();
                $id = $result['id'];
                $title = $result['title'];
                $firstname = $result['firstname'];
                $lastname = $result['lastname'];
                $createdAt = $result['created_at'];
                $createdBy = $result['creatorF']." ".$result['creatorL'];
                $updatedAt = $result['updated_at'];
                $telephone = $result['telephone'];
                $company = $result['company'];
                $assignedTo = $result['assignNameR']." ".$result['assignNameL'];

                // $notes = $stmt->fetch(PDO::FETCH_ASSOC);
            
                // echo "<div>".."</div>";
                echo "<div class='content'>";
                    echo "<div class='contact-top'>";
                        echo "<div class='info'>";
                            echo "<img src='../docs/user-profile-avatar-svgrepo-com.svg' alt=''>";
                            echo "<h2 id='user-ful-name'>".$title.' '.$firstname.' '.$lastname."</h2>";
                            echo "<p class='date-information'>Created on ".$createdAt." By ". $createdBy."</p>";
                            echo "<p class='date-information'>Updated on ".$updatedAt."</p>";
                        echo "</div>";
                        echo "<div class='control-buttons'>";
                            echo "<button class='button-1'><img src='../docs/hand-svgrepo-com.svg' alt=''> Assign to me</button>";
                            echo "<button class='button-2'><img src='../docs/switch-horizontal-svgrepo-com.svg' alt=''> Switch to Sales Lead</button>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='contact-details'>";
                        echo "<div class='user-info'>";
                            echo "<h3 class='titles'>Email</h3>";
                            echo "<p id='info-email'>".$email."</p>";
                        echo "</div>";
                        echo "<div class='user-info'>";
                            echo "<h3 class='titles'>Telephone</h3>";
                            echo "<p id='info-tele'>".$telephone."</p>";
                        echo "</div>";
                        echo "<div class='user-info'>";
                            echo "<h3 class='titles'>Company</h3>";
                            echo "<p id='info-company'>".$company."</p>";
                        echo "</div>";
                        echo "<div class='user-info'>";
                            echo "<h3 class='titles'>Assigned To</h3>";
                            echo "<p id='info-assigned'>".$assignedTo."</p>";
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='contact-notes'>";
                        echo "<div class=notes-top'>";
                            echo "<img src='../docs/note-text-svgrepo-com.svg' alt=''>";
                            echo "<h3 class='titles'>Notes</h3>";
                            echo "<hr>";
                        echo "</div>";
                        echo "<div class='notes'>";
                        $stmt1 = $link->prepare("SELECT * FROM notes WHERE contact_id=?");
                        $stmt1->bind_param("s",$id);
                        if ($stmt1->execute()) {
                            $results = $stmt1->get_result();
                            if ($results->num_rows > 0){
                                while ($row = $results->fetch_assoc()) {
                                    $stmt2 = $link->prepare("SELECT firstname,lastname FROM users WHERE id=?");
                                    $stmt2->bind_param("s",$row['created_by']);
                                    $stmt2->execute();
                                    $creatorName = $stmt2->get_result();
                                    $creatorName = $creatorName->fetch_assoc();
                                    echo "<div class='note'>";
                                    echo "<h4 class='note-creator'>".$creatorName['firstname'].' '.$creatorName['lastname']."</h4>";
                                    echo "<p id='note-details'>".$row['comment']."</p>";
                                    echo "<p class='note-date'>".$row['created_at']."</p>";
                                    echo "</div>";
                                }
                            }else{
                                echo "<p>NO NOTES AVAILABLE</p>";
                            }
                            
                        }
        
                        echo "</div>";
                echo "<div class='add-new-note'>";
                    echo "<p>Add new note about <span id='user-first-name'>Michael</span></p>";
                    "<form action='#'>";
                        echo "<textarea required placeholder='Enter details here.' name='note' id='text-note' cols='140' rows='10'></textarea>";
                        echo "<input class='note-submit' type='submit' value='Add Note'>";
                    echo "</form>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
        }else if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $comment = strip_tags($_POST['comment']);
            $noteFor = strip_tags($_POST['noteFor']);
            date_default_timezone_set("America/New_York");
            $stmt1 = $link->prepare("SELECT id from contacts WHERE email=?");
            $stmt1->bind_param("s", $noteFor);
            $stmt1->execute();
            $contactID = $stmt1->get_result();
            $contactID = $contactID->fetch_assoc()['id'];
            // Prepare an insert statement
            $stmt = $link->prepare("INSERT INTO Notes (contact_id, comment, created_by) VALUES (?, ?, ?)");
            
            $stmt->bind_param("ssi",$contactID ,$comment, $_SESSION['id'],);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                echo $noteFor;
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        }


?>
