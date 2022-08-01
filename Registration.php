<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 23.07.2022
 * Time: 22:14
 */

class Registration extends Db
{
    private $name;
    private $email;
    private $town;
    private $date_time;
    private $comment;

    public function getDbRegistrations()
    {
        $sql = "select * from registrations";
        $conn = $this->connectDb();
        $result = $conn->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $registrations[] = $row;
            }
            return $registrations;
        }
    }

    public function createRegistration()
    {
        $this->name = htmlspecialchars(strip_tags($_POST['name']));
        $this->email = htmlspecialchars(strip_tags($_POST['email']));
        $this->town = $_POST['townName'];
        $this->date_time = DateTime::createFromFormat('Y-m-d H:i:s', ($_POST['dateTime'] . ':00'))->format('Y-m-d h:i:s');
        $this->comment = htmlspecialchars(strip_tags($_POST['comment']));

        $sql = "INSERT INTO registrations(name, email, town, date_time, comment) VALUES (?, ?, ?, ?, ?)";

        $conn = $this->connectDb();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $this->name, $this->email, $this->town, $this->date_time, $this->comment);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}