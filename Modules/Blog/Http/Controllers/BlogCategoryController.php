<?php
/**
 * @package BlogCategoryController
 *@author peeap <dev@peeap.com>
 * @contributor mohamed <[dev@peeap.com]>
 * @created 29-09-2024
 */
namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Modules\Blog\DataTables\BlogCategoryDataTable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Http\Requests\BlogCategoryRequest;
use Modules\Blog\Http\Requests\BlogCategoryUpdateRequest;
use Modules\Blog\Http\Models\BlogCategory;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Blog\Exports\BlogCategoryListExport;
use Session;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('blog::category.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BlogCategoryRequest $request)
    {
        $data = ['status' => 'fail', 'message' => __('Invalid Request')];
        if ((new BlogCategory)->store($request->only('name', 'status'))) {
            $data['status'] = 'success';
            $data['message'] = __('The :x has been successfully saved.', ['x' => __('Category')]);
        }
        Session::flash($data['status'], $data['message']);
        return redirect()->route('blog.category.index');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(BlogCategoryUpdateRequest $request)
    {
        $data = ['status' => 'fail', 'message' => __('The :x has not been saved. Please try again.', ['x' => __('Blog Category')])];
        if ((new BlogCategory)->updateCategory($request->only('name', 'status', 'id'))) {
            $data['status'] = 'success';
            $data['message'] = __('The :x has been successfully saved.', ['x' => __('Category')]);
        }

        Session::flash($data['status'], $data['message']);
        return redirect()->route('blog.category.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function delete($id)
    {
        if ($id == 1) {
            return redirect()->route('blog.category.index')->withFail(__('This category can not be deleted!'));
        }

        if ($category = BlogCategory::find($id)) {
            $category->delete();
            return redirect()->route('blog.category.index')->withSuccess(__('Category has been successfully deleted.'));
        }

        return redirect()->route('blog.category.index')->withFail(__('Category does not found.'));
    }

    /**
     * Blog Category list pdf
     *
     * @return mixed
     */
    public function pdf()
    {
        $data['blogCategories'] = BlogCategory::getAllBlogCategory()->get();

        return printPDF($data, 'blog_categories_list_' . time() . '.pdf', 'blog::category.blog_category_list_pdf', view('blog::category.blog_category_list_pdf', $data), 'pdf');
    }

    /**
     * Blog Category list csv
     *
     * @return mixed
     */
    public function csv()
    {
        return Excel::download(new BlogCategoryListExport(), 'blog_categories_list_' . time() . '.csv');
    }
}
