<?php
session_start();
$error = '';
$name_err = '';
$email_err = '';
$comment_err = '';
$success_text = '';

if (isset($_GET['action']) && $_GET['action'] == 'update') {
    $dt = $_GET['dt'];
    foreach ($_SESSION['clearSkyEvents'] as $key => $event) {
        if ($key == $dt) {
            $townName = $event['townName'];
            $dateTime = $event['date'] . " " . $event["time"];
        }
    }
}

if (isset($_POST['register_submit'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['comment'])) {
        if (empty($_POST['name'])) {
            $name_err = "Enter your name! ";
        }
        if (empty($_POST['email'])) {
            $email_err = "Enter your email! ";
        }
        if (empty($_POST['comment'])) {
            $comment = $_POST['comment'];
            $comment_err = "Enter the comment! ";
        }
        $error = 'All fields must be filled!';
    } else {
        $error = '';
        if (saveRegistration()) {
            $success_text = "Registration successfully completed!";
        }
    }
}
?>

<div>
    <h2 class="page-title">Observer registration form</h2>
    <form id="register_form" name="register_form" method="post">
        <div>
            <div class="form-element">
                <label for="name">Name:</label>
                <div>
                    <input type="text"
                           class="el-input <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>"
                           name="name" id="name"
                           value="<?= isset($_POST["name"]) ? $_POST["name"] : '' ?>" maxlength="50">
                </div>
                <div>
                    <span class="error-text"><?php echo $name_err; ?></span>
                </div>
            </div>
            <div class="form-element">
                <label for="email">Email:</label>
                <div>
                    <input type="text"
                           class="el-input <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>"
                           name="email" id="email"
                           value="<?= isset($_POST["email"]) ? $_POST["email"] : '' ?>" maxlength="200">
                </div>
                <div class="col-md-4">
                    <span class="error-text"><?php echo $email_err; ?></span>
                </div>
            </div>
            <div class="form-element">
                <label for="town">Town:</label>
                <div>
                    <input type="hidden" id="townName" name="townName"
                           value="<?php echo $townName ? $townName : '' ?>"><?php echo $townName ?>
                </div>

            </div>
            <div class="form-element">
                <label for="dateTime">Date and Time:</label>
                <div>
                    <input type="hidden" id="dateTime" name="dateTime"
                           value="<?php echo $dateTime ? $dateTime : '' ?>"><?php echo $dateTime ?>
                </div>
            </div>
            <div class="form-element">
                <label for="comment">Comment:</label>
                <div>
                    <textarea class="el-input <?php echo (!empty($comment_err)) ? 'has-error' : '' ?>"
                              rows="8" id="comment" name="comment"
                              maxlength="200"><?= isset($_POST["comment"]) ? ($_POST["comment"]) : '' ?></textarea>
                </div>
                <div class="col-md-4">
                    <span class="error-text"><?php echo $comment_err; ?></span>
                </div>
            </div>
            <div class="form-element">
                <div>
                    <button class="success-button" type="submit" name="register_submit">
                        Register
                    </button>
                </div>
            </div>
            <br>
            <? if (isset($error)) { ?>
                <div>
                    <h4 class="error-text"><?= $error ?></h4>
                </div>
            <? } ?>
            <? if (isset($success_text)) { ?>
                <div>
                    <h5 class="success-text"><?= $success_text ?></h5>
                </div>
            <? } ?>
        </div>
    </form>
</div>
