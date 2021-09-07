<?php


namespace app\admin\controller;

use think\Db;
use think\Controller;


class Collection extends Controller
{
    public function index(){
        //定义每天日期
        $date = Date('Y-m-d');
        //获取数据起始时间
        $start = time();
        //获取数据结束时间（间隔十分钟）
        $end = time()+600;
        //获取数据
        $data=file_get_contents("https://www.zg.com/api/spot/market/udf/v1/history?symbol=BTE_USDT&resolution=1&from=".$start."&to=".$end);
        //转为数组
        $data = json_decode($data,true);
        //取出数组最后的一组数据
        //指导价格--美元
        $price_dollar = $data['c'][10];
        //最高价格--美元
        $high_dollar = $data['h'][10];
        //最低价格--美元
        $low_dollar = $data['l'][10];
        unset($data);
        //汇率6.95
        //指导价格
        $price = intval(($price_dollar*7)*10000)/10000;
        //最高价格
        $high = intval(($high_dollar*7)*10000)/10000;
        //最低价格
        $low = intval(($low_dollar*7)*10000)/10000;
        //存入数据库数据
        $info = [
            'date'=>$date,
            'price'=>$price,
            'high'=>$high,
            'low'=>$low,
            'price_dollar'=>$price_dollar,
            'high_dollar'=>$high_dollar,
            'low_dollar'=>$low_dollar,
        ];
        $count = Db::table('market')->where(['date'=>$date])->count();
        if(!$count){
            $info['create_at'] = date('Y-m-d H:i:s');
            Db::table('market')->insert($info);
        } else {
            unset($info['date']);
            $info['update_at'] = date('Y-m-d H:i:s');
            Db::table('market')->where(['date'=>$date])->update($info);
        }
    }
}