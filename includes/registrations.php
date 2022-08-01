<?php
$registrations = getRegistrations();
$error = '';
?>

<div>
    <h2 class="page-title">Registrations</h2>
    <?php
    if (isset($registrations) && count($registrations) > 0) {
        ?>
        <div>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Town</th>
                    <th>Date Time</th>
                    <th>Comment</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($registrations as $registration) { ?>
                    <tr>
                        <td><?php echo $registration['name'] ?></td>
                        <td><?php echo $registration['email'] ?></td>
                        <td><?php echo $registration['town'] ?></td>
                        <td><?php echo $registration['date_time'] ?></td>
                        <td><?php echo $registration['comment'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
    } else {
        $error = 'No data for display available!';
    }
    ?>
    <br>
    <? if (isset($error)) { ?>
        <div>
            <h4 class='error-text'><?= $error ?></h4>
        </div>
    <? } ?>
</div>
