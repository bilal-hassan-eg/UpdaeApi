<?php
class DBVersion{
    public function checkVersion($data)
    {
        try{
            $connection = mysqli_connect("127.0.0.1","editor","editor#bassemXtune","scriptsDB");
            if($connection){
                $sql = "SELECT * FROM info;";
                $result = mysqli_query($connection,$sql);
                $datasql = mysqli_fetch_all($result,MYSQLI_ASSOC);
                mysqli_free_result($result);
                print_r($data);
                if($datasql[0]["version"] == $data->version){
                    print_r("Update");
                }else{
                    print_r("NoUpdate");
                }
            }
        }catch(Exception $ex){
            echo $ex->getMessage();
        }  
    }
}
?>