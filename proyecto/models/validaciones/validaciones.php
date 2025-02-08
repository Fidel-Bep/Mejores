<?php 



class Validaciones
{


    public function validacionAlfanumerico($string = '')
    {
        global $db;


        $string = mysqli_real_escape_string($db, trim($string));

        return $string;
    }

    public function validacionEmail($email)
    {
        global $db;

        $email_validado = filter_var(trim($email), FILTER_VALIDATE_EMAIL) ? $email_validado = $email : $_SESSION['email_error_v'] = "El email_introducido no es válido";
        if (isset($_SESSION['email_error_v'])) {
            return $_SESSION['email_error_v'];
        } else {
            $email = mysqli_real_escape_string($db, $email_validado);
            return $email;
        };
    }

    public function validacionString($string)
    {
        global $db;

        $string = mysqli_real_escape_string($db, trim($string));
        return $string;
    }

    public function validacionNumero($num)
    {
        global $db;
        $num = mysqli_real_escape_string($db, trim(filter_var($num, FILTER_VALIDATE_INT)));
        return $num;
    }
}
