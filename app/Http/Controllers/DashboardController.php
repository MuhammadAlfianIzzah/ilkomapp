<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $db =   DB::connection("star_schema");
        $data = $db->select("SELECT tr.branch_name, tr.brand, SUM(tr.dollars_sold) AS dollars_sold , SUM(tr.units_sold)AS units_sold, SUM(tr.avg_sales)AS avg_sales FROM(SELECT b.branch_name,i.brand,sales.dollars_sold,sales.units_sold,sales.avg_sales FROM sales_fact_table  AS sales 
LEFT JOIN item AS i ON sales.item_key =  i.item_key
LEFT JOIN branch AS b ON sales.branch_key =  b.branch_key)AS tr GROUP BY tr.brand;");
        // var_dump($db->table("item")->get());
        $item = $db->table("item")->get();
        $data2 = $db->select("SELECT month, SUM(dollars_sold) AS dollars_sold,sum(units_sold) AS units_sold, SUM(avg_sales) AS avg_sales FROM(SELECT t.month, sales.dollars_sold,sales.units_sold,sales.avg_sales from sales_fact_table AS sales RIGHT JOIN time as t ON sales.timekey = t.timekey) AS transaksi GROUP BY transaksi.month;
");
        return view("dashboard", compact("data", "item", "data2"));
    }
}
