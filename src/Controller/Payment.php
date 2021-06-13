<?php

namespace App\Controller;

use App\Core\Container;
use App\Query\BarsQuery;
use App\Query\BNQuery;
use App\Query\LocationQuery;
use App\Query\UserQuery;

use Stripe\Stripe;

class Payment extends AbstractController
{
    const BAR_INDICATOR = 'bar';


    public function index(array $data = []): void
    {
        $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

        $locationData = false;

        $type = "";

        $id = $data["id"];

        $dates =Container::getInstance(LocationQuery::class)->getDates();

        if (str_starts_with($id, BarsQuery::BAR_INDICATOR)) {
            $locationData = Container::getInstance(BarsQuery::class)->findOneBy(['id' => ltrim($id, BarsQuery::BAR_INDICATOR)]);
            $type = BarsQuery::BAR_INDICATOR;
            $id = ltrim($id, BarsQuery::BAR_INDICATOR);
        } else if (str_starts_with($id, BNQuery::BN_INDICATOR)) {
            $locationData = Container::getInstance(BNQuery::class)->findOneBy(['id' => ltrim($id, BNQuery::BN_INDICATOR)]);
            $type = BNQuery::BN_INDICATOR;
            $id = ltrim($id, BNQuery::BN_INDICATOR);
        }
        $userLevel =  Container::getInstance(UserQuery::class)->getStoredUserLevel();


        $this->render('payment/index', ["level" => $userLevel, "locationData" => $locationData, "type" => $type, "id" => $id, "dates" => $dates]);
    }

    public function process(): void
    {
        $user_id = Container::getInstance(UserQuery::class)->findOneBy(['login' => $_SESSION['login'] ])->getId();

        $room_id = $_POST["id"];
        $type = $_POST["type"];

        $location_Date = $_POST["location_date"];
        $person_number = $_POST["person_number"];

        $email = $_POST["email"];
        $name = $_POST["name"];

        $number = $_POST["number"];
        $exp_month = $_POST["exp_month"];
        $exp_year = $_POST["exp_year"];
        $cvc = $_POST["cvc"];

        $cardData = [
            "card" => [
                "number" => $number,
                "exp_month" => $exp_month,
                "exp_year" => $exp_year,
                "cvc" => $cvc
            ]
        ];

        $error = false;
        $userError = false;

        if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name)) {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://api.stripe.com/v1/tokens',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_USERPWD => "sk_test_51IkaG8LfbP9HLlhMgp3q9HltPpxaukNg5sRE8NKVZblPK4sAf19I3Dq3bKHpeHJgt72vNa4Mk9AAkUuDeZpecRiy0041gCE6Gg",
                CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                CURLOPT_POSTFIELDS => http_build_query($cardData)
            ]);

            $response = json_decode(curl_exec($ch));
        } else {
            $userError = "L'email ou le nom est invalide";
        }


        if (!isset($response->id) && !$userError) {
            $userError = "La connection avec le service de payement n'a pus être effectué";

            if(isset($response->error->message))
            {
                $errMessage = $response->error->message;
                if(str_starts_with($errMessage, "Your card number is incorrect"))
                    $userError = "Votre numero de carte est incorrecte";
                else if(str_starts_with($errMessage,"Your card's expiration month is invalid"))
                    $userError = "Votre date d'expiration est invalide";
                else if(str_starts_with($errMessage,"Your card's security code is invalid"))
                    $userError = "Le numero de sécurité de votre carte est invalide";
                else
                    $userError = $errMessage;
                
            }
        } else if (isset($response->id)){
            $chargeData = [
                "amount" => 2000,
                "currency" => "eur",
                "source" => $response->id,
                "description" => "My First"
            ];
        }




        if (!$userError) {
            $ch = curl_init();
            curl_setopt_array($ch, [
                CURLOPT_URL => 'https://api.stripe.com//v1/charges',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_USERPWD => "sk_test_51IkaG8LfbP9HLlhMgp3q9HltPpxaukNg5sRE8NKVZblPK4sAf19I3Dq3bKHpeHJgt72vNa4Mk9AAkUuDeZpecRiy0041gCE6Gg",
                CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
                CURLOPT_POSTFIELDS => http_build_query($chargeData)
            ]);

            $response2 = json_decode(curl_exec($ch));
        }

        if (isset($response2->error) || $userError)
            $isValid = false;
        else {
            $isValid = true;

            $bar_Id = null;
            $bn_Id = null;
            $price = 0;

            if($type === BarsQuery::BAR_INDICATOR){
                $bar_Id = $room_id;
                $bar = Container::getInstance(BarsQuery::class)->findOneBy(["id" => $room_id]);

                if($bar->getPrice() !== null){
                    $price = $bar->getPrice();
                }

            }

            if($type === BNQuery::BN_INDICATOR){
                $bn_Id = $room_id;
                $bn = Container::getInstance(BNQuery::class)->getOneBy(["id" => $room_id]);

                if(isset($bn->price)){
                    $price = $bn->price;
                }

            }

            Container::getInstance(LocationQuery::class)->insertOne(
                $user_id ,
                $bar_Id,
                $bn_Id ,
                $price ,
                $location_Date,
                $person_number
            );
        }

        $this->render('payment/process', ["isValid" => $isValid,"errorMessage" => $userError]);
    }
}
