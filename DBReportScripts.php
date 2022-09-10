<?php 
class DBReportScripts{
    public function reportScript($data,$idBinFile)
    {
        try{
            $connection = mysqli_connect("127.0.0.1","editor","editor#bassemXtune","scriptsDB");
            if($connection){
                echo "Success Connection";
                $sql1 = "INSERT INTO ReportedScripts(IDScripts,BinFileName) VALUES ({$data->id},{$idBinFile})";
                mysqli_query($connection,$sql1);
                $sqlInsert = "UPDATE scripts SET IsReported=1 WHERE searchCommand='{$data->searchCommand}'";
                mysqli_query($connection,$sqlInsert);
                $sqlquery6 = "SET @reset = 0;";
                mysqli_query($connection,$sqlquery6);
                $sqlquery7 = "UPDATE scripts SET id = @reset:= @reset + 1;";
                mysqli_query($connection,$sqlquery7);
                mysqli_close($connection);
                echo "done :)";
            }else{
                echo "Error Connection". mysqli_connect_error();
            }
        }catch(Exception $ex){
            echo $ex->getMessage();
        }  
    }
    public function UNreportScript($data,$idReportedRow)
    {
        try{
            $connection = mysqli_connect("127.0.0.1","editor","editor#bassemXtune","scriptsDB");
            if($connection){
                echo "Success Connection";
                $sql1 = "DELETE FROM ReportedScripts WHERE id={$idReportedRow}";
                mysqli_query($connection,$sql1);
                $sqlInsert = "UPDATE scripts SET IsReported=0 WHERE searchCommand='{$data->searchCommand}'";
                mysqli_query($connection,$sqlInsert);
                $sqlquery6 = "SET @reset = 0;";
                mysqli_query($connection,$sqlquery6);
                $sqlquery7 = "UPDATE scripts SET id = @reset:= @reset + 1;";
                mysqli_query($connection,$sqlquery7);
                mysqli_close($connection);
                echo "done :)";
            }else{
                echo "Error Connection". mysqli_connect_error();
            }
        }catch(Exception $ex){
            echo $ex->getMessage();
        }  
    }
}

?>