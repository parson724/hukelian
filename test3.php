<?php
/**
 * Created by PhpStorm.
 * User: PB069744
 * Date: 2019/7/5
 * Time: 11:59
 */


class huKeLian
{

    public $weaponIntact       = [];
    public $weaponBroke        = [];
    public $luckNumber         = '1';
    public $luckFairyStatus    = 3;
    public $weaponId           = 1;
    public $needWeaponLevel    = 10;
    public $initWeaponNum      = 30;


    function __construct()
    {
        for($this->weaponId;$this->weaponId < $this->initWeaponNum;$this->weaponId++){
            $this->weaponIntact[$this->weaponId] = 4;
        }
    }

    function nextStatusNature(){
        $tempResults        =   $this->luckNumber%$this->luckFairyStatus;
        return $tempResults;
    }
    function nextStatusRandom(){
        $tempResults        =   rand(1,100)%$this->luckFairyStatus;
        return $tempResults;
    }

    function huKeLianShow(){
        switch($this->nextStatusRandom()){
            case '2':
                return '升';
            case '1':
                return '退';
            case '0';
                return '炸';
            }
        }

    function playerUpgrade(){
        if(empty($this->weaponIntact)){
            $this->addWeapon();

        }else{
            $this->upgradeWeapon();
        }
    }

    function upgradeWeapon(){
        $i = 1;
//        sort($this->weaponIntact);
        foreach($this->weaponIntact as $key=>$weaponSingle){
            if($i == 1){
            echo $this->huKeLianShow();
                if($this->huKeLianShow() != '炸'){
                        //weapon status
                        if($weaponSingle < 4){
                            $this->weaponIntact[$key] = $weaponSingle + 1;
                        }else{
                            if($this->huKeLianShow() == '升'){
                                $this->weaponIntact[$key] = $weaponSingle+1;
                            }else{
                                $this->weaponIntact[$key] = $weaponSingle-1;
                            }

                        }

                }else{
                    if($weaponSingle < 4){
                        $this->weaponIntact[$key] = $weaponSingle + 1;
                    }else{
                        $this->weaponBroke[$key] = $weaponSingle-1;
                        unset($this->weaponIntact[$key]);
                    }


                }

            }
            $i++;
        }


    }

    function addWeapon(){

        $this->weaponId;
        $this->weaponIntact[$this->weaponId] = 4;
        $this->weaponId= $this->weaponId+1;
    }

    function removeWeapon(){

    }
}

$givemesomething = new huKeLian();


for($givemesomething->luckNumber;$givemesomething->luckNumber<100;$givemesomething->luckNumber++){
    $givemesomething->playerUpgrade();
}

echo "<div class='block-list-all'>";

$bigvalue = '1';
$bigkey   = '';

foreach($givemesomething->weaponIntact as $key=> $value){
    if($value > $bigvalue){
        $bigkey = $key;
        $bigvalue = $value;
    }
}
foreach($givemesomething->weaponIntact as $key2=> $value2){
    if($bigkey == $key2){
        echo "<div class='block-list' style='color:#2f804e;font-size:25px;display:block'>" .$value2."</div>";
    }else{
        echo "<div class='block-list' style='color:forestgreen;font-size:25px;display:block'>" .$value2."</div>";
    }
}


$breakvalue = '1';
$breakkey   = '';

foreach($givemesomething->weaponBroke as $key3=> $value3){
    if($value3 > $breakvalue){
        $breakkey = $key3;
        $breakvalue = $value3;
    }
}
foreach($givemesomething->weaponBroke as $key4=> $value4){
    if($breakkey == $key4){
        echo "<div class='block-list' style='color:black;font-size:25px;'>" .$value4."</div>";
    }else{
        echo "<div class='block-list' style='color:indianred;font-size:25px;'>" .$value4."</div>";
    }
}

//echo "<pre>";
//print_r($givemesomething->weaponIntact);
//print_r($givemesomething->weaponBroke);

echo "</div>";
?>
<style>
    .block-list-all{
        width:300px;
        height:auto;
    }
    .block-list{
        width:30px;
        height:30px;
        float:left;
    }
</style>
