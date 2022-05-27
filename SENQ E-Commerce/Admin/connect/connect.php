    <?php 
    function getConnect()
    {
       //Change me to ur pc
        // $serverName="DESKTOP-8QIRQ1E";
        $serverName="YEABS-HP\MSSQLSERVER02";
        $connOptions=[
            "Database"=>"Ecom",
            "Uid"=>"", //leave uid and pw empty for windows Authenticatin
            "PWD"=>""
        ];
        $conn= sqlsrv_connect($serverName,$connOptions);
        if( !$conn ) {
        //will be displayed if there connection failed            
        echo "
        <title>Connection Crashed :(</title>
        <body>
          <div>
            <h1>Unable to Connect to Server :(</h1>
            <h2>Error 505</h2>
            Cause is
            <p>",print_r(sqlsrv_errors(), true),"</p>   
          </div>
          <style>
            body {
              height: 100%;
              width: 100%;
              display: flex;
              align-items: center;
              justify-content: center;
              background-color: rgb(108, 108, 117);
            }
            div {
              padding: 2%;
              overflow: hidden;
              width: 70%;
              height: 50%;
              text-align: left;
              background-color: red;
              border-radius: 30px;
              box-shadow: 4px 2px 10px 15px rgb(73, 86, 100);
              font-size: 1em;
              transition: 0.15s;
              color: white;
            }
            div:hover {
              transform: scale(1.05);
              box-shadow: 4px 10px 15px 25px rgb(88, 100, 113);
            }
          </style>
        </body>
            
        ";
        die(); // exiting the page
     }else{
         return $conn;
     }
    }
?>


