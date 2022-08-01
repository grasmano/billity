<?php
session_start();
$clearSkyEvents = getAllClearSkyEvents();
$_SESSION['clearSkyEvents'] = $clearSkyEvents;
$error = '';
?>
<div>
    <h2 class="page-title">Clear sky events</h2>
    <?php
    if (isset($clearSkyEvents) && count($clearSkyEvents) > 0) {
        ?>
        <form id="event_form" name="event_form" method="post" action="?page=booking">
            <div>
                <table>
                    <thead>
                    <tr>
                        <th>Town</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Weather</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($clearSkyEvents as $clearSkyEvent) {
                        ?>
                        <tr>
                            <td><input type="hidden" name="townName"
                                       value="<?php echo $clearSkyEvent['townName'] ?>"><?php echo $clearSkyEvent['townName'] ?>
                            </td>
                            <td><input type="hidden" name="date"
                                       value="<?php echo $clearSkyEvent['date'] ?>"><?php echo $clearSkyEvent['date'] ?>
                            </td>
                            <td><input type="hidden" name="time"
                                       value="<?php echo $clearSkyEvent['time'] ?>"><?php echo $clearSkyEvent['time'] ?>
                            </td>
                            <td><?php echo $clearSkyEvent['weather'] ?></td>
                            <td>
                                <a type="button"
                                   href="?page=booking&action=update&dt=<?php echo $clearSkyEvent['dt']; ?>">Choose event</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </form>
        <?php
    } else {
        $error = 'No events available due to bad weather!';
    }
    ?>
    <? if (isset($error)) { ?>
        <div>
            <h4 class='error-text'><?= $error ?></h4>
        </div>
    <? } ?>
</div>
