<?php
include_once('../middleware/adminmiddleware.php');
include_once('includes/header.php');

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;


// include_once('../vendor/autoload.php');

// $mail = new PHPMailer;

// // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
// $mail->isSMTP();                                            //Send using SMTP
// $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
// $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
// $mail->Username   = 'adiomusa77@gmail.com';                     //SMTP username
// $mail->Password   = 'ltnszaxhvbsuhutu';                               //SMTP password
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
// $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

// //Recipients
// $mail->setFrom('adiomusa77@gmail.com', 'Taobah');
// // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
// $mail->addAddress('ama4real9@gmail.com');               //Name is optional
// $mail->addAddress('taobah1@gmail.com');
// $mail->addReplyTo('adiomusa77@gmail.com', 'Information');
// // $mail->addCC('cc@example.com');
// // $mail->addBCC('bcc@example.com');

// // //Attachments
// // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
// // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

// //Content
// $mail->isHTML(true);                                  //Set email format to HTML
// $mail->Subject = 'Here is the subject';
// $mail->Body    = '<h4>Kindly click <a href="localhost\website\staff_register.php">here</a> to register and log in</h4>';
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

// if(!$mail->send()){
//   echo "Message could not be sent";
// }
// else{
//   echo "Message succesfully sent";
// }

?>

  <h1 class="container text-center text-white bg-black my-5">STAFF LIST</h1>
  <div class="container mt-5">
    <div class="d-flex justify-content-between mb-2">
      <h2>ALL STAFFS</h2>
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">ADD STAFF</button>
    </div>
    <div class="card-body" id="staffs_table">
          <table class="table table-bordered text-center" id="staffsTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Role</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $sql = "SELECT * FROM staffs";
              $result_d =mysqli_query($conn, $sql);
              
                while($row=mysqli_fetch_assoc($result_d)) { 
                ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['name']; ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['password'] ?></td>
                <td><?= $row['role_as'] == 1 ? "Admin": "User"; ?></td>
                <td><a href="edit_staff.php?id=<?= $row['id']; ?>" class="btn btn-success editProductBtn" data-bs-target="#editModal" data-bs-toggle="modal">Edit</a></td>
                  <td><button type="button" value="<?= $row['id'] ?>" class="btn btn-danger delete_staff_btn">Delete</button></td>
              </tr>
              <?php
              }; 
                ?>
            </tbody>
          </table>
        </div>
  </div>

  <div class="modal" id="editModal" tabindex="-1" style="z-index: 99999999!important">
    <div class="modal-dialog modal-x">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User</h5>
          <button type="button" class="btn-close close-modal-btn" data-bs-dismiss="modal" aria-label="Close"><h4></h4></button>
        </div>
        <div class="modal-body">
          <div id="editPane"></div>
        </div>
      </div>
    </div>
  </div>

  <form action="../add_staff.php" method="POST" id="studentForm" class="form">
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD STAFF</h1>
            <button type="button" class="btn-close clearData" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email Address">
            <div id="emailError" class="alert alert-danger mt-2 d-none"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary clearData" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" name="submitStaffBtn">ADD</button>
        </div>
      </div>
    </div>
  </form>




  <?php include_once('includes/footer.php'); ?>

  <script>
        $(document).ready( function () {
            $('#staffsTable').DataTable({
              // "columnDefs": [
              //       {"targets": 0},
              //       {"targets": 3, "className": "text-center"},
              //       {"targets": 4, "className": "text-center"}
              //   ],
            });
          } );  
      </script>