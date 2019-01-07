<?php
class Poker{
private $poker;
private $xin=array();
private $fang=array();
private $mei=array();
private $hei=array();
function __construct($card_count=52){
$this->poker=range(0,$card_count-1);
}
public function poker(){
return $this->poker;
}

    public function rand($num=5){//随机取出五张牌
        $this->poker=array_rand($this->poker,$num);
        return $this;
    }

    public function name(){//为了方便查看牌名
        foreach ($this->poker as $key=>$value){
            $res=$value/13;
            $res2=$value%13;
            if($res<1){
                $str='红心';
            }elseif ($res<2){
                $str='方块';
            }elseif ($res<3){
                $str='梅花';
            }else{
                $str='黑桃';
            }

            switch ($res2){
                case 0:
                    $str.='2';
                    break;
                case 1:
                    $str.='3';
                    break;
                case 2:
                    $str.='4';
                    break;
                case 3:
                    $str.='5';
                    break;
                case 4:
                    $str.='6';
                    break;
                case 5:
                    $str.='7';
                    break;
                case 6:
                    $str.='8';
                    break;
                case 7:
                    $str.='9';
                    break;
                case 8:
                    $str.='10';
                    break;
                case 9:
                    $str.='J';
                    break;
                case 10:
                    $str.='Q';
                    break;
                case 11:
                    $str.='K';
                    break;
                case 12:
                    $str.='A';
                    break;

            }
            $this->poker[$key]=$value.'('.$str.')';
        }
        return $this->poker;
    }

    public function sort(){//将牌按照梅方桃黑以及数字由小到大的顺序进行排序
        foreach ($this->poker as $key=>$value){
            $res=$value/13;

            if($res<1){
                array_push($this->xin,$value);
            }elseif ($res<2){
                array_push($this->fang,$value);
            }elseif ($res<3){
                array_push($this->mei,$value);
            }else{
                array_push($this->hei,$value);
            }
        }
        sort($this->mei);
        sort($this->fang);
        sort($this->xin);
        sort($this->hei);
        $this->poker=array_merge($this->mei,$this->fang,$this->xin,$this->hei);
        return $this;
    }
}

$a=new Poker();
print_r($a->rand(5)->sort()->name());//先随机取5张再排序，最后输出排序后的牌及名称
