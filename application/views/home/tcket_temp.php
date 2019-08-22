<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>tickets4u</title>
<link rel="stylesheet" href="https://channels.intrepidprojects.co.ke/icons.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" style="background-color: #eee;">
    
<br>
<div style="margin:0 auto !important;padding:20px; max-width: 500px;background-color: #fff;border-radius: 4px;">
    
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody><tr>
        <td bgcolor="#ffffff" align="center">
        
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:500px" class="m_-9170412488597135291responsive-table">
        <tbody><tr>
                <td bgcolor="#ffffff" align="center">
                    
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:500px;border-bottom:1px dotted #aaa" class="m_-9170412488597135291wrapper">
                        <tbody><tr>
                            <td align="center" valign="top" style="padding:10px 0;font-size:18px;color:#333;font-family:Helvetica,Arial,sans-serif;text-transform:uppercase" class="m_-9170412488597135291logo">
                                Download Ticket
                            </td>
                        </tr>
        </tbody>
    </table>
            
        
            
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:500px" class="m_-9170412488597135291responsive-table">
        <tbody><tr>
            <td>
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tbody><tr>
                        <td align="center" style="font-family:Helvetica,Arial,sans-serif">
                            <p style="font-size:25px;color:#124aa1;margin:0;padding-top:10px;font-weight: bold;">
                            <?php 
                            $total = 0;
                                foreach ($event_info as $key => $value) {
                                    $total = $total + ($value['ticket_amount'] * $value['number_of_tickets']); 
                                }
                                echo "KES. ".$total;
                                ?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="padding:20px 0 30px 0;text-align:center;font-size:14px;line-height:25px;font-family:Helvetica,Arial,sans-serif;color:#666666" class="m_-9170412488597135291padding-copy">You have successful sucured a place in <?php echo $event_info[0]['event_title']; ?> event.<br/>
                        Location: <?php echo $event_info[0]['event_venue']; ?><br/>
                        Date: <?php echo $event_info[0]['event_date']; ?><br/>
                        </td>
                    </tr>
                </tbody>
                </table>

            </td>
        </tr>
        <tr>
            <td style="padding:10px 0 0 0;border-top:1px dotted #aaa">
                        
    <table cellspacing="0" cellpadding="0" border="0" width="100%">

        <tbody><tr>
            <td valign="top" style="padding:0" class="m_-9170412488597135291mobile-wrapper">

    <table cellspacing="0" cellpadding="0"  style="width: 100%; padding: 5px;font-size: 14;font-family: Helvetica,Arial,sans-serif;color: #101010;">
         <thead>
            <tr style="background-color: #eee;">
                <th style="padding: 4px;">Name</th>
                <th style="padding: 4px;">No.</th>
                <th style="padding: 4px;">Unit Cost</th>
                <th style="padding: 4px;">Sub Total</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($event_info as $key => $value) {
           
            ?>
            <?php if($value['number_of_tickets'] >= 1){ ?>
            <tr>
                <td style="padding-left: 30;"><?php echo $value['ticket_type']; ?></td>
                <td style="text-align: center;"><?php echo $value['number_of_tickets']; ?></td>
                <td style="text-align: center;"><?php echo $value['ticket_amount']; ?></td>
                <td style="text-align: center;"><?php echo ($value['ticket_amount'] * $value['number_of_tickets']); ?></td>
            </tr>
            <?php
            }
        }
        ?>
        </tbody>
    </table>
    <br>
     <div style='width: 100%; text-align: center; max-width: 500px; margin: 0 auto;'>
      
      <span align='center' style='width: 30%; text-align: center; border-radius: 4px; padding: 12px; background: #148eb9;'>
        <a target='_blank' href="<?php echo base_url().'index.php/ViewTickets?order='.$event_info[0]['order_id']; ?>"
        style='color: #ffffff; text-decoration: none; display: inline-block;'>
        <span style='color: #ffffff;'>Download Ticket</span>
        </a>
      </span>
      <br>
     
    <div style='text-align: center; width: 100%; max-width: 500px;margin: 0 auto; padding-top: 10%;'>
      Payments are processed securely by <a href="https://ipayafrica.com/">iPay Limited</a>
      <br>
      <small><i><b>making payments easy</b></i></small>
    </div>
    </div>
                                     
</td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td>


</td>
</tr>
<tr>
<td>


</td>
</tr>
<tr>
<td>


</td>
</tr>
<tr>
<td style="border-bottom:1px dotted #aaa">


</td>
</tr>
</tbody>
</table>

</td>
</tr>
</tbody></table>


</td>
</tr>

<tr>
<td bgcolor="#fff" align="center">



</td>
</tr>
</tbody></table>
</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width:500px;margin: 0 auto;max-width: 500px;" class="m_-9170412488597135291responsive-table">
<tbody><tr>
<td align="center" style="font-size:12px;line-height:18px;font-family:Helvetica,Arial,sans-serif;color:#666666; background-color: #eee;padding-top: 30px;padding-bottom: 30px;">
Sent from <a target='_blank' href="https://www.tickets4u.co.ke/"" style="color:#00508f;text-decoration:none" target="_blank">tickets4u.co.ke"</a>
<br>
</td>
</tr>
</tbody></table>
</body>
</html>