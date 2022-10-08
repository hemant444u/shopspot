<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use \Newsletter;

class MailChimpController extends Controller

{


    public $mailchimp;

    public $listId = '0e5ec5601as';


    public function __construct()

    {

        //

    }


    public function manageMailChimp()

    {

        return view('mailchimp');

    }


    public function subscribe(Request $request)

    {
        Newsletter::subscribe('rincewind@discworld.com');
    }
    public function createCampaign(
        string $fromName,string $replyTo,string $subject,string $html = '',string $listName= '',array $options = [],array $contentOptions = [])
    {
        
    }


    public function sendCompaign(Request $request)
    {
        $api = Newsletter::getApi();
        // https://usX.api.mailchimp.com/3.0/campaigns/3e06f4ec92/actions/send
        $campaign_id = $request->id;
        $send = $api->post("'campaigns/'.$campaign_id.'/actions/send'");
    }


}
