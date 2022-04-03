<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Payment Page</title>
  </head>
  <body style="background-color:#E7EBE0FF">

        <div class="container-fluid">
            <div class="container">

            <!-- ************************ -->

                <!-- Header Area -->
                <div name="headerArea" id="headerArea" class="form-control" style="margin-top:20px; background-color:#5B84B1FF;">
                    <div class="form-floating">
                        <h1 style="text-align:center;font-size:2vw;">******************* Header Area *******************</h1>
                    </div>
                </div>


                <br>


                <!-- Content Area -->
                <div name="contentArea" id="contentArea" class="form-control" style="margin-top:10px;background-image: url('<?php echo base_url();?>public/img/bgImage.jpg'); ">
                    <center>
                    <div name="detailsContainer" id="detailsContainer" style="width:50%;">
                        <h2 style="font-size:2vw;margin-top:10px;">Payer Detals</h2>

                    
                        <form method="post" action="<?php echo base_url('razorpayPage');?>">

                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="nameId" name="name" placeholder="Full Name">
                                <label for="nameId">Name</label>
                            </div>

                            <!-- <br> -->

                            <div class="form-floating mb-1">
                                <input type="email" class="form-control" id="emailId" name="email" placeholder="name@example.com">
                                <label for="emailId">Email</label>
                            </div>

                            <!-- <br> -->
                            
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="mobNoId" name="mobile" placeholder="Mobile Number">
                                <label for="mobNoId">Mobile No.</label>
                            </div>

                            <!-- <br> -->
                        

                            <div style="text-align:left;"><p style="font-size:1vw;">Indian Rupee (INR), 100 Paisa = 1 Rupee </p></div>
                            <div class="form-floating mb-1" style="margin-top:-15px;">
                                <input type="text" class="form-control" id="amountId" name="amount" placeholder="Rs">
                                <label for="amountId">Rupee</label>
                            </div>

                        

                            <!-- Button area -->
                            
                            <div name="buttonArea" id="buttonArea"  style="margin-top:10px;margin-bottom:10px; text-align:right;">

                                <button type="submit" class="btn btn-outline-primary" id="nextBtn" style="padding-left:10px;" >Pay-Now</button>


                                <!-- <button type="button" class="btn btn-outline-primary" id="nextBtn" style="padding-left:10px;" onclick="sendDataTServer();" >Pay-Now</button> -->
                                <button type="button" class="btn btn-outline-danger" id="clearBtn" style="padding-left:22px;padding-right:22px;margin-right:5px;" onclick="clearEntry();">Clear</button>
                            </div>

                        </form>
                    
                    </div>
                    </center>
                </div>

                <!-- Footer Area -->
                <div name="footerArea" id="footerArea" class="form-control" style="margin-top:10px;margin-bottom:20px;background-color:#5B84B1FF;">
                    <div class="form-floating">
                        <h1 style="text-align:center;font-size:2vw;">============== Footer Area ==============</h1>
                    </div>
                </div>

            <!-- ****************** -->
            </div>
        </div>

    
    
    <script type="text/javascript">

        function clearEntry(){
            document.getElementById('nameId').value="";
            document.getElementById('emailId').value="";
            document.getElementById('mobNoId').value="";
            document.getElementById('amountId').value="";
        }

        function sendDataTServer(){

            var nameObj=document.getElementById('nameId');
            var emailObj=document.getElementById('emailId');
            var mobileObj=document.getElementById('mobNoId');
            var amountObj=document.getElementById('amountId');

            let dataTosend={   
                name:nameObj.value,
                email:emailObj.value,
                mobile:mobileObj.value,
                amount:amountObj.value

            };

            alert(JSON.stringify(dataTosend));

            if(dataTosend!=null && dataTosend!={}){

                if(dataTosend['name']!=null && dataTosend['name']!="" &&
                dataTosend['email']!=null && dataTosend['email']!="" &&
                dataTosend['mobile']!=null && dataTosend['mobile']!="" &&
                dataTosend['amount']!=null && dataTosend['amount']!="")
                {
                    
                    $.ajax({
                        url:"<?php echo base_url('IndexController/getData');?>",
                        type:"POST",
                        data:dataTosend,
                        success:function(RespondedData) {  
                            
                            // let decodedData=JSON.parse(RespondedData);
                            alert(RespondedData);
                            clearEntry();
                        
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) { 
                            console.log(XMLHttpRequest);
                            console.log(errorThrown);
                        }
                    });   
                }
                else{
                    alert("Please provide all information");
                }
        }
        else{
            alert("Please provide all information");
        }

        }



    </script>


    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
  </body>
</html>