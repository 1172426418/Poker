# Poker
一副完整纸牌有 52 张(无大小王)，4 种不同花色，每种花色 13 张。我们用一个整数 m 表示出所有的 52 种情况，规则是：

m / 13： =0: 红心，=1: 方块，=2: 梅花，=3: 黑桃

m % 13: =0:2，=1:3，=2:4 .... =8:10，=9:J，=10:Q，=11: K，=12:A

比如：m = 15 表示：方块 4 m=38 表示：梅花 A

Q:( 基础项 ) -- #

我们希望用程序模拟 1 副扑克牌随机抽取 5 张，发给某人的过程。

发牌后需要排序：规则是：先按花色，再按点数。花色的大小顺序是：梅花、方块、红心、黑桃。点数的顺序是：2、3、4、…. 10、J、Q、K、A。
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

        public function rand($num=5){
            $this->poker=array_rand($this->poker,$num);
            return $this;
        }

        public function name(){
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

        public function sort(){
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
    print_r($a->rand(5)->sort()->name());
