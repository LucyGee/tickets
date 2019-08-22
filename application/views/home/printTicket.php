<html>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700);
    body, h1, h2, h3, h4, h5, h6{
        font-family: 'Roboto', serif;}
    }
</style>
<style type="text/css">
    
    div.print{
        background: #ba0006;
        border: 0;
        width: 100%;
        height: 40px;
        border-radius: 3px;
        color: white;
        margin-top: 3px;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    div.print:hover {
        background: #16aa56;
    }
    th, td {
        padding: 5px;
        text-align: left;    
    }
</style>

  
    <img src="" alt="" width="" height="" />
 
<?php foreach ($tickets as $ticket) : ?>
    <body style="padding:20px";>
        <div id="printableArea">
            <table cellspacing="0" style="background-repeat: no-repeat; background-position: center center; padding: 5px; width: 864px; height: 454px;">
                <tbody>

                    <tr style="height: 100px;">
                        <td style="width: 605px; height: 10px; padding-left: 15px;border: 5px solid #cccccc ; border-left:10px solid #cccccc ;border-top:10px solid #cccccc ; " colspan="2"><span style="font-size: 20pt;">
<?php echo $event_tittle;?>
 </span></td>
                        <td style="width: 286px; background-color: #ccc; height: 10px;border-left: 5px solid #cccccc ;border-right: 5px solid #cccccc ;border-top: 5px solid #cccccc ; text-align: center;"></td>
                    </tr>

                    <tr style="height: 5px;">
                        <td style="width: 311px; height: 5px; padding-left: 15px;border: 5px solid #cccccc ;border-left:10px solid #cccccc ;"><strong><strong>Event Date: </strong> 
</strong>
 <p><?php echo $event_date;?> <br/>
        <?php echo $time;?></p>
                           
                        </td>
                        <td style="width: 294px; height: 5px; padding-left: 15px; border: 5px solid #cccccc ;"><strong><strong>Location:</strong></strong>
<p><?php echo $location;?></p></td>
                        <td style="width: 286px;background-color: #ccc; height: 5px; border-left: 5px solid #cccccc ;border-right: 5px solid #cccccc ;border-bottom: 5px solid #cccccc ;">
                            <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo">
                        </td>
                    </tr>

                    <tr style="height: 5px;">
                        <td style="width: 311px; height: 5px; padding-left: 15px; border: 5px solid #cccccc ;border-left:10px solid #cccccc ;" colspan="1">
                            <strong>Order Id:</strong>
                            <?php echo $ticket['order_id'];?>
                        </td>
                        <td style="width: 311px; height: 5px; padding-left: 15px; border: 5px solid #cccccc ;" colspan="1"><strong>ordered by :</strong> 
                           <?php echo $ticket['clientName'];?>
                        </td>
                        <td style="width: 286px; height: 5px; padding-left: 15px;border: 5px solid #cccccc ;border-right:10px solid #cccccc ;">
                            <strong>Transaction Date:</strong>
                            <p><?php echo $ticket['created_at'];?></p>
                        </td>
                    </tr>

                    <tr style="height: 5px;">
                        <td style="width: 311px; height: 5px; padding-left: 15px; border: 5px solid #cccccc ;border-left:10px solid #cccccc ;">
                            <strong>
                                <strong>Ticket Type:</strong>
                               <?php echo $ticket['ticket_type'];?>
                            </strong>
                            
                        </td>
                        <td style="width: 294px; height: 5px; padding-left: 15px; border: 5px solid #cccccc ;"><strong><strong>Serial No:</strong></strong>
                            <?php echo $ticket['serial_number'];?>
                        </td>
                        <td style="width: 286px; height: 5px; padding-left: 15px; border: 5px solid #cccccc ;border-right:10px solid #cccccc ;">
                            <strong>Amount:</strong>Ksh. <?php echo $ticket['ticket_amount'];?>
                            
                        </td>
                    </tr>

                   <tr style="height: 50px;">
                        <td style="width: 450px; height: 5px; text-align: center; border: 5px solid #cccccc ;border-left:10px solid #cccccc ;border-bottom:10px solid #cccccc ;border-right:10px solid #cccccc ;" colspan="3">
                     
                            <table>
                                <tr>
                                    <td style="width: 100%; align: center;"><img alt='testing' src='<?php echo base_url(); ?>assets/barcode/barcode.php?text=<?php echo$ticket['serial_number'];?>&orientation=horizontal&size=40&print=true' width='60%'/></td>
                                    
                                </tr>
                            </table>
                          </td>
                    </tr>
                </tbody>
            </table>


            <table width="850" >
                <tbody>
                    <tr>
                        <td>
                            <h4 style="font-family:Roboto; font-size:10px">TICKETS TERMS AND CONDITIONS</h4>
                            <p style="font-family:Roboto; font-size:8px; font-weight:400">
                           
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>         
        </div>

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />

        <div>
            <table style="margin: 0px auto;">
              <tr>
                <td>
                   </td>
              </tr>
            </table>
        </div>
       
    </body>
<?php endforeach;?>
  
</html>