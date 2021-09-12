<?php
/**
 * Created by PhpStorm.
 * User: NM NM
 * Date: 01/12/2019
 * Time: 01:07 م
 */

namespace App\Http\Services;


use App\Http\Repositories\MainReopsitory;
use App\Models\Contact;

class ContactService
{
    public function __construct(Contact $contact)
    {
        $this->repo = new MainReopsitory($contact);
    }

    public function getContactsService()
    {
        return $this->repo->getall();
    }


    public function destroyContactService($id)
    {
        $this->repo->delete($id);
        return response()->json();

    }
}