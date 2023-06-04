<?php
# @Author: Sahebul
# @Date:   2019-06-13T17:26:13+05:30
# @Last modified by:   Sahebul
# @Last modified time: 2019-06-13T17:26:21+05:30

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Reports_model extends MY_Model
{
  protected $tbl;
  protected $primary_key;
  function __construct(){
    parent::__construct();
    $this->tbl="tbl_products";
    $this->primary_key = "prod_id";
  }
    function get_products_report(){
      $query = "SELECT
                  tp.name as product_name,
                  tc.name as category,
                  tb.name as brand,
                  tpp.attributes_value as attributes_value,
                  tap.name as attribute,
                  tpp.sold_as,
                  tpp.price,
                  tpp.tax_rate,
                  tpp.inventory
                 FROM tbl_products as tp
                 LEFT JOIN tbl_product_price as tpp on tp.prod_id=tpp.prod_id
                 LEFT JOIN tbl_product_attributes as tap on tap.attributes_id=tpp.attributes_id
                 LEFT JOIN tbl_category as tc on tp.category_id=tc.category_id
                 LEFT JOIN tbl_brand as tb on tb.brand_id=tb.brand_id
                 WHERE  tp.is_deleted='0' group by tpp.prod_price_id";
      return $this->db->query($query)->result('array');
    }
    function get_category_report(){
      $query = "SELECT
                  tc.name as Category,
                  tp.num_of_prods as Number_of_products
                 FROM tbl_category as tc
                 LEFT JOIN (select count(prod_id) as num_of_prods,category_id from tbl_products group by category_id ) as tp on tp.category_id=tc.category_id
                 WHERE tc.is_deleted='0'";
      return $this->db->query($query)->result('array');
    }
    function get_brands_report(){
      $query = "SELECT
                  tb.name as Brands,
                  tp.num_of_prods as Number_of_products
                 FROM tbl_brand as tb
                 LEFT JOIN (select count(prod_id) as num_of_prods,brand_id from tbl_products group by brand_id ) as tp on tp.brand_id=tb.brand_id
                 WHERE tb.is_deleted='0'";
      return $this->db->query($query)->result('array');
    }
    function get_sales_report($from_date,$to_date){
      $query = "SELECT
                  tp.name as product_name,
                  ts.attributes_value as attributes_value,
                  ts.sold_as,
                  ts.qty as quantity,
                  ts.price,
                  ts.tax_rate,
                  ts.total,
                  ts.order_id,
                  ts.sales_date
                 FROM tbl_sales as ts
                 LEFT JOIN tbl_products as tp ON tp.prod_id=ts.prod_id
                 WHERE  ts.is_deleted='0' AND (ts.sales_date between '$from_date' AND  '$to_date') group by ts.sales_id";
      return $this->db->query($query)->result('array');
    }
}
