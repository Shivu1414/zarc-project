 <?php

class login
{
    public static function checkPassword($email)
    {
        $sql = "SELECT agent_pass FROM crm_agents WHERE agent_email = ?";
        $params = [$email];
        return DatabaseHandler::GetOne($sql, $params);
    }

    public static function checkValidUser($email, $enteredPassword)
    {
        $hashedPassword = self::checkPassword($email);

        if ($hashedPassword && password_verify($enteredPassword, $hashedPassword)) {

            $check = generalOperations::checkUserType($email, $hashedPassword);

            if ($check && isset($check[0]['login_type'])) {
                $result = generalOperations::getUserDetails($email);

                if ($check[0]['login_type'] === 'manager') {
                    $_SESSION['manager'] = true;
                    setcookie("manager", true, time() + 7200);
                } elseif ($check[0]['login_type'] === 'agent') {
                    $_SESSION['agent'] = true;
                    setcookie("agent", true, time() + 7200);
                }


                $_SESSION['agent_id'] = $result[0]['agent_id'];
                $_SESSION['agent_name'] = $result[0]['agent_name'];
                $_SESSION['agent_contact'] = $result[0]['agent_contact'];

                setcookie("agent_id", $result[0]['agent_id'], time() + 7200);
                setcookie("agent_name", $result[0]['agent_name'], time() + 7200);
                setcookie("agent_contact", $result[0]['agent_contact'], time() + 7200);
                setcookie("login_type", $result[0]['login_type'], time() + 7200);

                return true;
            }
        }

        error_log("Unsuccessful login attempt for email: $email");

        return false;
    }

    public static function isLoggedIn()
    {
        $isLoggedIn = isset($_SESSION['login_type']) || isset($_COOKIE['login_type']);
        return $isLoggedIn;
    }
}
