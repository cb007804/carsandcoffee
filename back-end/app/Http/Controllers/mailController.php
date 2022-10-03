<?php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Mailjet\Resources;
use Mailjet\Client;
class mailController extends Controller
{
   
    public function sendMail(Request $request)
    {
        require base_path("vendor/autoload.php");

  $mj = new Client('e9272e45dddbab9145836d34adf2796a','6cafc8c4abb675b6cc2dc82679385647',true,['version' => 'v3.1']);
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "ktatukorle@gmail.com",
          'Name' => "Car and coffe"
        ],
        'To' => [
          [
            'Email' => "ktatukorle@gmail.com",
            'Name' => "Car and coffe"
          ]
        ],
        'Subject' => "Customer Message",
        'TextPart' => "Car and coffe",
        'HTMLPart' => "Dear User, <br /><br />
        You have customer message details as follow.<br /><br />
        <strong>Name: $request->name<br />
        Email: $request->email<br /><br />
        </strong>

        Message: $request->msg
        Thank You.",
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);

  $mj2 = new Client('e9272e45dddbab9145836d34adf2796a','6cafc8c4abb675b6cc2dc82679385647',true,['version' => 'v3.1']);
  $body2 = [
    'Messages' => [
      [
        'From' => [
          'Email' => "ktatukorle@gmail.com",
          'Name' => "Car and coffe"
        ],
        'To' => [
          [
            'Email' => $request->email,
            'Name' => $request->name
          ]
        ],
        'Subject' => "Greetings from Car and coffe.",
        'TextPart' => "Car and coffe",
        'HTMLPart' => "Dear $request->name, <br /><br />
        Thank you contact us we will update you soon.<br /><br />
        Thank You.",
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response2 = $mj2->post(Resources::$Email, ['body' => $body2]);

  echo "Mail send";

            
    }

    
    
}    