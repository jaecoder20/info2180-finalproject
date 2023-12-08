<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt = $link->prepare("SELECT c.*,u.firstname as aNameR,u.lastname as aNameL,n.* FROM contacts c 
        JOIN users u ON u.id=c.created_by JOIN notes n ON n.id = c.id WHERE c.email=':email'");
        $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if($result){
                $title = $result['title'];
                $firstname = $result['firstname'];
                $lastname = $result['lastname'];
                $createdAt = $result['created_at'];
                $createdBy = $result['created_by'];
                $updatedAt = $result['updated_at']
                $email1 = $result['email'];
                $telephone = $result['telephone'];
                $company = $result['company'];
                $assignedTo = $result['aNameR']." ".$result['aNameL'];
                $stmt = $link->prepare("SELECT c.*,n.* FROM contacts c JOIN notes n ON n.contact_id=c.id WHERE c.email=':email'");
                $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
                $stmt->bindParam(':email', $email, PDO::PARAM_INT);
                $notes = $stmt->fetch(PDO::FETCH_ASSOC);
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
                        echo "<div class='user-info'>"
                            echo "<h3 class='titles'>Telephone</h3>";
                            echo "<p id='info-tele>".$telephone."</p>";
                        echo "</div>";
                        echo "<div class='user-info'>";
                            echo "<h3 class='titles'>Company</h3>";
                            echo "<p id='info-company'>".$company."</p>";
                        echo "</div>";
                        echo "<div class='user-info'>"
                            echo "<h3 class='titles'>Assigned To</h3>"
                            echo "<p id='info-assigned'>".$assignedTo."</p>"
                        echo "</div>";
                    echo "</div>";
                    echo "<div class='contact-notes'>";
                        echo "<div class=notes-top'>";
                            echo "<img src='../docs/note-text-svgrepo-com.svg' alt=''>";
                            echo "<h3 class='titles'>Notes</h3>";
                            echo "<hr>";
                        echo "</div>";
                        echo "<div class='notes'>";
                            echo "<div class='note'>";
                                echo "<h4 class='note-creator>John Doe</h4>"
                                echo "<p id='note-details'></p>";
                                echo "<p class='note-date'>Date</p>";
                            echo "</div>";
                        echo "</div>"
                echo "<div class='add-new-note'>"
                    echo "<p>Add new note about <span id='user-first-name'>Michael</span></p>";
                    "<form action='#'>"
                        echo "<textarea required placeholder='Enter details here.' name='note' id='text-note' cols='140' rows='10'></textarea>";
                        echo "<input type='submit' value='Add Note'>";
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
        }

?>
