<?php
/**
 * @package CouponRedeemController
* @author peeap <pay.peeap@gmail.com>
 * @contributor Md. Al Mamun <[pay.peeap@gmail.com]>
 * @created 05-09-2024
 */


namespace Modules\Coupon\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Coupon\DataTables\CouponRedeemDataTable;
use Modules\Coupon\Http\Models\CouponRedeem;
use Modules\Coupon\Exports\CouponRedeemListExport;
use Excel;

class CouponRedeemController extends Controller
{
    /**
     * Coupon Redeem List
     *
     * @param CouponDataTable $dataTable
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(CouponRedeemDataTable $dataTable)
    {
        return $dataTable->render('coupon::redeem.index');
    }

    /**
     * Coupon list pdf
     *
     * @return html static page
     */
    public function pdf()
    {
        $data['redeems'] = CouponRedeem::with('plan:id,name')->orderByDesc('id')->get();
        return printPDF($data, 'coupon_redeem_list' . time() . '.pdf', 'coupon::redeem.pdf', view('coupon::redeem.pdf', $data), 'pdf');
    }

    /**
     * Coupon list csv
     *
     * @return html static page
     */
    public function csv()
    {
        return Excel::download(new CouponRedeemListExport(), 'coupon_redeem_list' . time() . '.csv');
    }
}
