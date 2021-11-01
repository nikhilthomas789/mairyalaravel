<?php

namespace App\Exports;

use App\Model\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
class UsersExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('purchase')
            ->join('creditors', 'purchase.party_id', '=', 'creditors.id')
            ->join('head', 'head.id', '=', 'creditors.head_id')
            ->select('purchase.id','purchase.inv_date','purchase.inv_no','purchase.amount','purchase.billdiscount','purchase.check_no','purchase.check_date','purchase.check_amount','purchase.acnum','purchase.user','creditors.name as partynamename','head.name as headname','purchase.entry_id','purchase.status')->get();


    }



        public function headings(): array
    {
        return [
            'ID',
            'Invoice Date',
            'Invoice Number',
            'Amount',
            'Bill Discount',
            'Check No',
            'Check Date',
            'Check Amount',
            'Account Number',
            'User',
            'Party Name',
            'Head Name',
            'Purchase/Return',
            'Staus'
        ];
    }

}