<?php
namespace Modules\FAQ\Exports;

use Modules\FAQ\Entities\Faq;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    WithMapping
};
use Modules\CMS\Http\Models\ThemeOption;
use Illuminate\Support\Collection;

class FaqListExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * [Here we need to fetch data from data source]
     * @return [Database Object] [Here we are fetching data from User table and also role table through Eloquent Relationship]
     */
    public function collection(): collection
    {
        return Faq::orderBy('id', 'desc')->get();
    }

    /**
     * [Here we are putting Headings of The CSV]
     * @return [array] [Excel Headings]
     */
    public function headings(): array
    {
        return[
            'Title',
            'Layout',
            'Description',
            'Status',
            'Created At'
        ];
    }
    /**
     * [By adding WithMapping you map the data that needs to be added as row. This way you have control over the actual source for each column. In case of using the Eloquent query builder]
     * @param [object] $userList [It has users table info and roles table info]
     * @return [array]            [comma separated value will be produced]
     */
    public function map($faqList): array
    {
        $layouts = ThemeOption::faqLayout();
        return[
            $faqList->title,
            ucfirst($layouts[$faqList->layout_id]),
            $faqList->description,
            ucfirst($faqList->status),
            timeZoneFormatDate($faqList->created_at),
            
        ];
    }
}