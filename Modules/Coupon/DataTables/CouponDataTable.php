<?php
/**
 * @package CouponDataTable
 * @author peeap <pay.peeap@gmail.com>
 * @contributor Mohamed <[pay.peeap@gmail.com]>
 * @created 05-09-2024
 */

 
 namespace Modules\Subscription\DataTables;

 namespace Modules\Coupon\DataTables;

 use App\DataTables\DataTable;
 use Modules\Coupon\Http\Models\Coupon;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class CouponDataTable extends DataTable
{
    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax(): JsonResponse
    {
        $coupons = $this->query();
        return datatables()
            ->of($coupons)
            ->editColumn('name', function ($coupons) {
                return wrapIt($coupons->name, 10, ['columns' => 2]);
            })->editColumn('code', function ($coupons) {
                return wrapIt($coupons->code, 10, ['columns' => 2]);
            })->editColumn('discount_type', function ($coupons) {
                return $coupons->discount_type;
            })->editColumn('discount_amount', function ($coupons) {
                return $coupons->discount_type == 'Flat' ? formatNumber($coupons->discount_amount) : formatCurrencyAmount($coupons->discount_amount) . '%';
            })->editColumn('start_date', function ($coupons) {
                return timeZoneFormatDate($coupons->start_date);
            })->editColumn('end_date', function ($coupons) {
                return timeZoneFormatDate($coupons->end_date);
            })->editColumn('status', function ($coupons) {
                return statusBadges(lcfirst($coupons->status));
            })->addColumn('action', function ($coupons) { 
                $str = '';
                if ($this->hasPermission(['Modules\Coupon\Http\Controllers\CouponController@edit'])) {
                    $str .= '<a title="' . __('Edit :x', ['x' => __('Coupon')]) . '" href="' . route('coupon.edit', ['id' => $coupons->id]) . '" class="btn btn-xs btn-primary"><i class="feather icon-edit neg-transition-scale-svg "></i></a>&nbsp';
                }
                if ($this->hasPermission(['Modules\Coupon\Http\Controllers\CouponController@destroy'])) {
                    $str .= '<form method="post" action="' . route('coupon.delete', ['id' => $coupons->id]) . '" id="delete-coupons-'. $coupons->id . '" accept-charset="UTF-8" class="display_inline">
                        ' . csrf_field() . '
                        <button title="' . __('Delete :x', ['x' => __('Coupon')]) . '" class="btn btn-xs btn-danger confirm-delete" type="button" data-id=' . $coupons->id . ' data-label="Delete" data-delete="coupons" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-title="' . __('Delete :x', ['x' => __('Coupon')]) . '" data-message="' . __('Are you sure to delete this?') . '">
                        <i class="feather icon-trash-2"></i>
                        </button>
                        </form>';
                }
                return $str;
            })
            ->rawColumns(['name', 'code', 'discount_type', 'discount_amount', 'start_date', 'end_date', 'status', 'action'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $coupons = Coupon::select('id', 'name', 'code', 'discount_type', 'discount_amount', 'start_date', 'end_date', 'status')->filter();
        return $this->applyScopes($coupons);
    }

    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html()
    {
        return $this->builder()
        ->addColumn(['data' => 'id', 'name' => 'id', 'title' => __('Id'), 'visible' => false])
        ->addColumn(['data' => 'name', 'name' => 'name', 'title' => __('Name')])
        ->addColumn(['data' => 'code', 'name' => 'code', 'title' => __('Code')])
        ->addColumn(['data' => 'discount_type', 'name' => 'discount_type', 'title' => __('Discount Type')])
        ->addColumn(['data' => 'discount_amount', 'name' => 'discount_amount', 'title' => __('Discount Amount')])
        ->addColumn(['data' => 'start_date', 'name' => 'start_date', 'title' => __('Start Date')])
        ->addColumn(['data' => 'end_date', 'name' => 'end_date', 'title' => __('End Date')])
        ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])
        ->addColumn(['data'=> 'action', 'name' => 'action', 'title' => __('Action'), 'width' => '10%',
        'visible' => $this->hasPermission(['Modules\Coupon\Http\Controllers\CouponController@edit', 'Modules\Coupon\Http\Controllers\CouponController@destroy']),
        'orderable' => false, 'searchable' => false])
        ->parameters(dataTableOptions(['dom' => 'Bfrtip']));
    }

    public function setViewData()
    {
        $statusCounts = $this->query()
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $this->data['groups'] = ['All' => $statusCounts->sum()] + $statusCounts->toArray();
    }
}
