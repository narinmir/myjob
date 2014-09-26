<?
date_default_timezone_set('Asia/Seoul');
echo " 이 프로그램은 sort 를 실행하는 프로그램 입니다.  원하시는 sort 종류를 골라 주세요 \n";
$cmd = readline(" 1. selection sort 2. buble sort 3. insertion sort : ");

$obj = new MySort();
$obj->setSort($cmd);

#if (!is_int($cmd)) goodbyeProgram("번호를 입력해 주세요");
if ($cmd < 1 || $cmd > 3) goodbyeProgram("1,2,3 번호중 하나를 선택해 주세요");

$cmd = readline("정렬할 배열을 입력해 주세요 ex:9,1,88,8,4,6,55,11,3,8 : ");

$obj->setArray($cmd);
$obj->startSort();

class MySort
{
    var $sortArray = array();
    var $sortnum;

    public function selecttionSort()
    {
        echo " start sorting time ".date("Y-m-d H:i:s")."\n";

        for ( $i = 0 ; $i < sizeof($this->sortArray) ; $i ++ )
        {
            $temp = $this->sortArray[$i];
            $find_offset = $i;

            for ( $j = $i + 1 ; $j < sizeof($this->sortArray) ; $j ++ )
            {
                if ($this->sortArray[$j] <= $this->sortArray[$find_offset])
                {
                    $find_offset = $j;
                }
            }

            echo " index $i key $temp offset $find_offset \n ";
            echo " before switch ".implode(",",$this->sortArray)."\n";
            $this->sortArray[$i] = $this->sortArray[$find_offset];
            $this->sortArray[$find_offset] = $temp;
            echo " after switch ".implode(",",$this->sortArray)."\n";
        }

        echo " end sorting time ".date("Y-m-d H:i:s")."\n";

    }

    public function bubleSort()
    {
        echo " start sorting time ".date("Y-m-d H:i:s")."\n";

        for ( $i = 0 ; $i < sizeof($this->sortArray) ; $i ++ )
        {
            echo " before switch ".implode(",",$this->sortArray)."\n";

            for ( $j = 0 ; $j < ((sizeof($this->sortArray)-$i)-1) ; $j ++ )
            {
                if ($this->sortArray[$j] >= $this->sortArray[$j+1])
                {
                    $temp = $this->sortArray[$j];
                    $this->sortArray[$j] = $this->sortArray[$j+1];
                    $this->sortArray[$j+1] = $temp;
                }
            }
            echo " after switch ".implode(",",$this->sortArray)."\n\n";
        }

        echo " end sorting time ".date("Y-m-d H:i:s")."\n";
    }

    public function insertionSort()
    {
        echo " start sorting time ".date("Y-m-d H:i:s")."\n";

        for ( $i = 0 ; $i < sizeof($this->sortArray) ; $i ++ )
        {
            $temp = $this->sortArray[$i];
            $find_offset = $i;

            for ( $j = $i + 1 ; $j < sizeof($this->sortArray) ; $j ++ )
            {
                if ($this->sortArray[$j] <= $this->sortArray[$find_offset])
                {
                    $find_offset = $j;
                }
            }

            echo " index $i key $temp offset $find_offset \n ";
            echo " before switch ".implode(",",$this->sortArray)."\n";
            $this->sortArray[$i] = $this->sortArray[$find_offset];
            $this->sortArray[$find_offset] = $temp;
            echo " after switch ".implode(",",$this->sortArray)."\n";
        }

        echo " end sorting time ".date("Y-m-d H:i:s")."\n";

    }

    public function quickSort()
    {
    }


    public function setArray($arr)
    {
        $this->sortArray = explode(",",$arr);
    }

    public function setSort($sortnum)
    {
        $this->sortnum = $sortnum;
    }

    public function startSort()
    {
        switch($this->sortnum)
        {
        case 1:
            $this->selecttionSort();
            break;
        case 2:
            $this->bubleSort();
            break;
        case 3:
            $this->insertionSort();
            break;
        }
    }



}



function goodbyeProgram($msg)
{
    echo $msg."\n";
    exit;
}
