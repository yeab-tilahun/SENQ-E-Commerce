 //setting the background video to either of the two background videos
 document.querySelector("#bgVideo").src=("icons/mainPanelBg"+ Math.ceil((Math.random()*2)) + ".MP4").toString();
  
 
 
 
 
 
 
 
 
 //code that changes MainPanel content based on which sideMenu Item is selected
    var mainMenu=document.querySelector(".mainMenu");
    var homePageBtn=document.querySelector("#homePage");
    var addProductBtn=document.querySelector("#add");
    var stockUpdateBtn=document.querySelector("#stock");
    var removeBtn=document.querySelector("#remove");
    var priceUpdateBtn=document.querySelector("#update");
    var transactionsBtn=document.querySelector("#tran");
    var analyticsBtn=document.querySelector("#analytics");
    var logoutBtn=document.querySelector("#logOut");
    var iframe=document.querySelector("iframe");
    
    function resetAllSideMenuButtonBgColor(){
        
        iframe.style.display="block";
        mainMenu.style.display="none"; ///coomment this later
        
        var btns=document.querySelectorAll(".sideMenuItem");
        btns.forEach(btn => {
            btn.style.backgroundColor="transparent";
        });
    }

    homePageBtn.onclick=()=>{
        resetAllSideMenuButtonBgColor();
        iframe.style.display="none";
        mainMenu.style.display="grid";
        homePageBtn.style.backgroundColor ="rgb(44, 44, 177)";       
    }
    addProductBtn.onclick=()=>{
        iframe.src=("AddNewProduct/AddNewProd.php");
        resetAllSideMenuButtonBgColor();
        addProductBtn.style.backgroundColor ="rgb(44, 44, 177)";
    }
    stockUpdateBtn.onclick=()=>{
        iframe.src=("UpdateStock/UpdateStock.php");
        resetAllSideMenuButtonBgColor();
        stockUpdateBtn.style.backgroundColor ="rgb(44, 44, 177)";
    }
    removeBtn.onclick=()=>{
        iframe.src=("RemoveProduct/RemoveProduct.php");
        resetAllSideMenuButtonBgColor();
        removeBtn.style.backgroundColor ="rgb(44, 44, 177)";
    }
    priceUpdateBtn.onclick=()=>{
        iframe.src=("UpdatePrice/UpdatePrice.php");
        resetAllSideMenuButtonBgColor();
        priceUpdateBtn.style.backgroundColor ="rgb(44, 44, 177)";
    }
    transactionsBtn.onclick=()=>{
        iframe.src=("ViewTransaction/ViewTran.php");
        resetAllSideMenuButtonBgColor();
        transactionsBtn.style.backgroundColor ="rgb(44, 44, 177)";
    }
    analyticsBtn.onclick=()=>{
        iframe.src=("ViewAnalytics/ViewAnalytics.php");
        resetAllSideMenuButtonBgColor();
        analyticsBtn.style.backgroundColor ="rgb(44, 44, 177)";
        
    }
    logoutBtn.onclick=()=>{
        window.close();
    //    alert('Make a redirect to landing page heree yeab!');
       resetAllSideMenuButtonBgColor();
       logoutBtn.style.backgroundColor ="rgb(44, 44, 177)";
    }

       
    document.querySelector("#addProd").onclick=addProductBtn.onclick;
    document.querySelector("#UpdateStock").onclick=stockUpdateBtn.onclick;
    document.querySelector("#removeProd").onclick=removeBtn.onclick;
    document.querySelector("#updateProd").onclick=priceUpdateBtn.onclick;
    document.querySelector("#ViewTran").onclick=transactionsBtn.onclick;
    document.querySelector("#ViewAnalytics").onclick=analyticsBtn.onclick;

    











    //code displays weather panel on hover of the time and date panel
    var timeDateWeatherHover=document.querySelector("#timeDateWeather");
    var weatherPanel=document.querySelector("#weather");
    timeDateWeatherHover.onmouseover=()=>{
        weatherPanel.style.display="block";
    }
    timeDateWeatherHover.onmouseleave=()=>{
        weatherPanel.style.display="none";
    } 














    // code that sets the current date and time to the datetime panel/div
    var dayname=document.querySelector("#dayname")
    var month=document.querySelector("#month")
    var daynum=document.querySelector("#daynum")
    var year=document.querySelector("#year")
    var hour=document.querySelector("#hour")
    var minutes=document.querySelector("#minutes")
    var seconds=document.querySelector("#seconds")
    var period=document.querySelector("#period")
    var days=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
    var months=["Jan","Feb","Mar","April","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]; 

    // setting the time and date every second(1000ms)
    setInterval(() => {              
        var now=new Date();
        dayname.innerHTML=days[now.getDay()];
        month.innerHTML=months[now.getMonth()];
        daynum.innerHTML=now.getDate();
        year.innerHTML=now.getFullYear();
        let hourNow=now.getHours();
        let AMandPM="AM";
        if(hourNow==0) hour=12;
        if(hourNow > 12){
            hourNow=hourNow-12;
            AMandPM="PM";
        }
        hour.innerHTML=hourNow.toString().padStart(2, "0");
        period.innerHTML=AMandPM;
        minutes.innerHTML=now.getMinutes().toString().padStart(2, "0");
        seconds.innerHTML=now.getSeconds().toString().padStart(2, "0");
    }, 1000);















        //code that uses openweather.org API to get the current weather
        var temperature=document.querySelector("#temp");
        var condition=document.querySelector("#condition");
        function fetchWeather(){
                fetch("https://api.openweathermap.org/data/2.5/weather?q=Addis%20Ababa&units=metric&appid=0c1943c27245bdeb33c0706fba22362e")
                .then((response)=>response.json())
                .then((data)=>{
                    const {temp}=data.main; //temperature is stored in temp now.
                    temperature.innerHTML=(Math.round(temp)+"°C"); //setting the tempreture
                    condition.innerHTML=("Mostly Sunny, Low Humidity");
                    console.log(data);
                }).catch(function(err){ //incase there is no interent
                    temperature.innerHTML=("0°C");
                    condition.innerHTML=("Currently Unavailable");
                });

        }
        fetchWeather();//executing the fetchWeatherfunction when page is loaded

