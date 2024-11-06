<?php
/**
 * @package AddonsMangerController
* @author Mohamed <dev@peeap.com>
 * @contributor Sabbi <[dev@peeap.com]>
 * @contributor  Mamun <[dev@peeap.com]>
 * @created 20-05-2024
 * @modified 04-10-2024
 */
namespace App\Http\Controllers;

class AddonsMangerController extends Controller
{
    /**
     * All addons list
     *
     * @return mixed
     */
    public function index()
    {
        \Session::flash('info', __('Please make sure to change your environment from Production to local before uploading a new addon to prevent any potential issues on the live system')
            . " <a href='https://help.techvill.net/switching-from-production-to-local-environment' target='_blank'> <i class='feather icon-external-link'>" . __('See Documentation') . "</i></a>"
        );

        $data['available'] = miniCollection(json_decode(file_get_contents("Modules/Addons/available_addons.json"), true));
        
        return view('admin.addons.index', $data);
    }
}
