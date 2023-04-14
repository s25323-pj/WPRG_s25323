<form action="" method="GET">
    <label for="birthdate">Wybierz datę urodzenia:</label>
    <input type="date" id="birthdate" name="birthdate">
    <button type="submit">Wyślij</button>
</form>
<?php
if(isset($_GET['birthdate'])){
    $birthdate = $_GET['birthdate'];

    function getWeekday($birthdate){
        $weekdays = array("niedziela", "poniedziałek", "wtorek", "środa", "czwartek", "piątek", "sobota");
        $weekdayNumber = date('w', strtotime($birthdate));
        $weekday = $weekdays[$weekdayNumber];
        echo "Urodziłeś/aś się w $weekday. <br>";
    }

    function getAge($birthdate){
        $birthdateTimestamp = strtotime($birthdate);
        $currentDate = date('Y-m-d');
        $currentTimestamp = strtotime($currentDate);
        $difference = $currentTimestamp - $birthdateTimestamp;
        $age = floor($difference / (365*60*60*24));
        echo "Masz $age lat. <br>";
    }

    function getNextBirthday($birthdate){
        $currentYear = date('Y');
        $birthdateYear = date('Y', strtotime($birthdate));
        $nextBirthday = date("$birthdateYear-m-d");
        if($nextBirthday < date('Y-m-d')){
            $nextBirthday = date("$currentYear-m-d", strtotime("+1 year", strtotime($birthdate)));
        }
        $difference = strtotime($nextBirthday) - strtotime(date('Y-m-d'));
        $days = floor($difference / (60*60*24));
        echo "Do Twoich kolejnych urodzin pozostało $days dni.";
    }

    getWeekday($birthdate);
    getAge($birthdate);
    getNextBirthday($birthdate);
}
?>